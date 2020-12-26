<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use DB;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index()
    {
        return view('auth.register');
    }

    public function addUser(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:255',
                'phone' => 'required|string|min:6',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ]
        );
        if ($validator->fails())
        {
            return redirect('/register')->withInput($request->all())->withErrors($validator->messages());
        }
        DB::table('users')->insert(
        [
            'fname' => $request->get('fname'),
            'lname' => $request->get('lname'),
            'phone'=> $request->get('phone'),
            'email'=> $request->get('email'),
            'landmark' => '',
            'city' => '',
            'state' => '',
            'country' => '',
            'address' => '',
            'created_at' => NOW(),
            'updated_at' => NOW(),
            'password'=> bcrypt($request->get('password'))
        ]
        );
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
            if ($request->session()->get('user_id', true) == true) {
                $user_id = $request->session()->get('user_id', true);
                try {
                    DB::table('cart')
                        ->Where('user_id', $user_id)
                        ->update(['user_type' => 'user']);
                    DB::table('cart')
                            ->Where('user_id', $user_id)
                            ->update(['user_id' => Auth::user()->id]);
                }
                catch (\Exception $e) {
                    //dd($e->getMessage());
                }
                $request->session()->forget('user_id');
            }
        }else{
            dd("Auth Failed.....");
        }
        return view('/home');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required|string|min:4',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'phone' => $data['phone'],
            'landmark' => '',
            'city' => '',
            'state' => '',
            'country' => '',
            'address' => '',
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}

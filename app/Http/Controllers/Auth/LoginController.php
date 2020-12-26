<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use DB;
use Auth;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    protected function authenticated(Request $request, $user)
    {

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
        return redirect('/profile');
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}

<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Hash;
use Mail;
use App\User;
use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay;
use App\http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\CheckOutMail;
class PaymentController extends Controller
{
    public function checkOut(Request $request)
    {
        if ($request->get("type") == "check") {
            if (!Hash::check($request->get('password'), Auth::user()->password, [])) {
                return redirect('/cart/checkout')->withErrors(["status"=>"Password Not Match"]);
            }
        }else{
            $validator = Validator::make(
                $request->all(),
                [
                    'fname' => 'required|string|max:255',
                    'lname' => 'required|string|max:255',
                    'phone' => 'required|string|min:6',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6',
                ]
            );
            if ($validator->fails())
            {
                return redirect('/cart/checkout')->withInput($request->all())->withErrors($validator->messages());
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
        }
        $amount = 0;
        $courses = DB::table('courses')
            ->join('cart', 'cart.course_id', '=', 'courses.id')
            ->where('user_id', Auth::user()->id)
            ->get();
            foreach ($courses as $c) {
                $prices = DB::table('price')->where(['course_id'=> $c->course_id])->first();
                $amount = $amount + $prices->country_in;
            }
            $amount = $amount + ($amount*18/100);
    	$parameters = [
        	'tid' => $this->randomId(),
        	'order_id' => DB::table('transactions')->count()+1,
        	'amount' => $amount,
            'email'=>   Auth::user()->email,
            'firstname'=> Auth::user()->fname . " ". Auth::user()->lname,
            'phone'=> Auth::user()->phone,
            'productinfo'=> 'certify courses checkout'
      	];
      	$order = Indipay::gateway('PayUMoney')->prepare($parameters);
      	return Indipay::process($order);
    }

    public function response(Request $request)

    {
        $response = Indipay::response($request);
        dd($response);
    }

    public function success(Request $request)
    {
        $response = Indipay::response($request);
        DB::table('transactions')->insert([
          'payuMoneyId'=>$response['mihpayid'],
          'status'=>$response['status'],
          'txnid'=>$response['txnid'],
          'amount'=>$response['amount'],
          'addedon'=>$response['addedon'],
          'user_id'=>Auth::user()->id,
        ]);
        $arr = [
          'payuMoneyId'=>$response['mihpayid'],
          'status'=>$response['status'],
          'txnid'=>$response['txnid'],
          'amount'=>$response['amount'],
          'addedon'=>$response['addedon'],
          'user_id'=>Auth::user()->id,
        ];
        Mail::to(Auth::user()->email)->send(new CheckOutMail($arr));
        DB::table('cart')
            ->where('user_id',Auth::user()->id)
            ->update('status',1);
        return redirect('/profile')->with([
          'status'=>$response['status'],
        ]);
    }

    public function cancel(Request $request)
    {
        $response = Indipay::response($request);
        DB::table('transactions')->insert([
          'payuMoneyId'=>$response['mihpayid'],
          'status'=>$response['status'],
          'txnid'=>$response['txnid'],
          'amount'=>$response['amount'],
          'addedon'=>$response['addedon'],
          'user_id'=>Auth::user()->id,
        ]);
        $arr = [
          'payuMoneyId'=>$response['mihpayid'],
          'status'=>$response['status'],
          'txnid'=>$response['txnid'],
          'amount'=>$response['amount'],
          'addedon'=>$response['addedon'],
          'user_id'=>Auth::user()->id,
        ];
        Mail::to(Auth::user()->email)->send(new CheckOutMail($arr));
        return redirect('/profile')->with([
          'status'=>$response['status'],
        ]);
    }
    private function randomId()
    {
        $random_id_length = 10;
        $rnd_id = bcrypt(uniqid(rand(),1));
        $rnd_id = strip_tags(stripslashes($rnd_id));
        $rnd_id = str_replace(".","",$rnd_id);
        $rnd_id = strrev(str_replace("/","",$rnd_id));
        $rnd_id = substr($rnd_id,0,$random_id_length);
        return $rnd_id;
    }
}

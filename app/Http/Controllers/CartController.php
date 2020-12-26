<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $this->getUserId($request);
        $country = $this->ip_info("Visitor", "Country Code");
        $courses = DB::table('courses')
            ->join('cart', 'cart.course_id', '=', 'courses.id')
            ->where('user_id', $user_id)
            ->where('status', '0')
            ->get();
            foreach ($courses as $c) {
                $prices = DB::table('price')->where(['course_id'=> $c->course_id])->first();
                $prices = $prices->country_in;
                $c->price = $prices;
            }
        return view('cart',
                [
                    'courses'=>$courses
                ]);
    }
    public function checkout(Request $request)
    {
        $user_id = $this->getUserId($request);
        $country = $this->ip_info("Visitor", "Country Code");
        $courses = DB::table('courses')
            ->join('cart', 'cart.course_id', '=', 'courses.id')
            ->where('user_id', $user_id)
            ->where('status', '0')
            ->get();
            foreach ($courses as $c) {
                $prices = DB::table('price')->where(['course_id'=> $c->course_id])->first();
                $prices = $prices->country_in;
                $c->price = $prices;
            }
        return view('checkout',
                [
                    'courses'=>$courses
                ]);
    }
    public function addToCart(Request $request)
    {
        $user_id = $this->getUserId($request);
        if(Auth::Guest())
        {
            $user_type = "guest";
        }
        else
        {
            $user_type = "user";
        }
        if(DB::table('cart')
            ->where(['user_id'=> $user_id, 'course_id'=>$request->get('id')])
            ->where('status', '0')
            ->count() == 0){
            DB::table('cart')->insert(
                [
                    'user_id' => $user_id,
                    'user_type' => $user_type,
                    'course_id'=> $request->get('id'),
                    'created_at'=> NOW()
                ]
            );
        }
        return redirect('/cart');
    }


    public function removeFromCart(Request $request)
    {
        $user_id = $this->getUserId($request);
        DB::table('cart')
            ->where([
                        'id'=>$request->get('id'),
                        'user_id'=>$user_id
                    ])
            ->delete();
        return redirect('cart');
    }



    private function getID()
    {
        $id = uniqid();
        session(['user_id' => $id]);;
        return $id;
    }
    private function randomId()
    {
        $random_id_length = 20;
        $rnd_id = bcrypt(uniqid(rand(),1));
        $rnd_id = strip_tags(stripslashes($rnd_id));
        $rnd_id = str_replace(".","",$rnd_id);
        $rnd_id = strrev(str_replace("/","",$rnd_id));
        $rnd_id = substr($rnd_id,0,$random_id_length);
        return $rnd_id;
    }

    private function getUserId($request)
    {
        if(Auth::Guest())
        {
            if ($request->session()->get('user_id', false) == false) {
                $user_id = $this->getID();
            }else{
                $user_id = $request->session()->get('user_id', false);
            }
        }
        else
        {
            $user_id = Auth::id();
        }
        return $user_id;
    }
}

<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function makePayment()
    {
        dd("Added new user to the database and from here rediret to payment getway");
    }
    public function profile()
    {
    	return view('profile');
    }

    public function setting()
    {
      return view('profile');
    }
    public function results()
    {
        $results = DB::table('results')
            ->join('courses', 'course_id', '=', 'courses.id')
              ->where('user_id',Auth::user()->id)
              ->orderBy('results.id', 'desc')
              ->get();
        return view('profile')->with([
            'results'=>$results,
        ]);
    }
    public function transactions()
    {
        $transactions = DB::table('transactions')
            ->where('user_id',Auth::user()->id)
            ->get();
        return view('profile')->with([
          'transactions' => $transactions,
        ]);
    }
    public function course($value='')
    {
      $courses = DB::table('courses')
            ->join('cart', 'cart.course_id', '=', 'courses.id')
            ->where('cart.user_id',Auth::user()->id)
            ->where('cart.status',1)
            ->get();
      return view('profile')->with([
        'courses' => $courses,
      ]);
    }
}

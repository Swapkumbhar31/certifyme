<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function welcome()
    {
        $courses_cat = DB::table('course_category')->get();
        $courses = DB::table('courses')->get();
        $featurecourses = DB::table('courses')->orderBy('rating','desc')->limit(4)->get();
        $country = $this->ip_info("Visitor", "Country Code"); 
        foreach($featurecourses as $f){
            $prices = DB::table('price')->where(['course_id'=> $f->id])->first();
            if ($prices == null) {
                $f->prices = -1;
            }else{
                if($country == 'IN') {
                    $f->prices = '&#x20A8; '.number_format($prices->country_in,2);
                }
                elseif ($country == 'UK') {
                    $f->prices = '&#xa3; '. number_format($prices->country_uk,2);
                }else{
                    $f->prices = '&#x24; '.number_format($prices->country_us,2);
                }
            }
        }
        return view('welcome',
                [
                    'courses_cat'=>$courses_cat,
                    'courses'=>$courses,
                    'featurecourses'=>$featurecourses,
                ]
        );
    }

    public function aboutUs()
    {
        $courses_cat = DB::table('course_category')->get();
        $courses = DB::table('courses')->get();
        return view('aboutus',[
            'courses_cat'=>$courses_cat,
            'courses'=>$courses,
        ]);
    }

    public function ourteam()
    {
        $courses_cat = DB::table('course_category')->get();
        $courses = DB::table('courses')->get();
        return view('ourteam',[
            'courses_cat'=>$courses_cat,
            'courses'=>$courses,
        ]);
    }
    public function careers()
    {
        $courses_cat = DB::table('course_category')->get();
        $courses = DB::table('courses')->get();
        return view('careers',[
            'courses_cat'=>$courses_cat,
            'courses'=>$courses,
        ]);
    }
    public function aluminispeck()
    {
        $courses_cat = DB::table('course_category')->get();
        $courses = DB::table('courses')->get();
        return view('aluminispeck',[
            'courses_cat'=>$courses_cat,
            'courses'=>$courses,
        ]);
    }
    public function contactus()
    {
        $courses_cat = DB::table('course_category')->get();
        $courses = DB::table('courses')->get();
        return view('contactus',[
            'courses_cat'=>$courses_cat,
            'courses'=>$courses,
        ]);
    }
}

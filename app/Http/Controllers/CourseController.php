<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use Mail;
use App\Mail\CorporateTrainingMail;
use App\Mail\CorporateTrainingMailAdmin;
use App\Mail\CourseInquiryAdmin;
use App\Mail\CourseInquiryMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function course($name,$id)
    {
        $count = DB::table('courses')->where('id',$id)->count();
        if ($count == 0) {
            dd("Invalid Course ID"); 
        }
        $country = $this->ip_info("Visitor", "Country Code"); 
        $courses = DB::table('courses')->get();
        $course = DB::table('courses')->where('id', $id)->first();
        $prices = DB::table('price')->where(['course_id'=> $id])->first();
        if ($prices == null) {
            $prices = -1;
        }else{
            if($country == 'IN') {
                $prices = '&#x20A8; '.number_format($prices->country_in,2);
            }
            elseif ($country == 'UK') {
                $prices = '&#xa3; '. number_format($prices->country_uk,2);
            }else{
                $prices = '&#x24; '.number_format($prices->country_us,2);
            }
        }
        $course_info = DB::table('course_info')->where('course_id', $id)->get();
        $courses_cat = DB::table('course_category')->get();
        $description = $this->getConentType($course_info,'2');
        $featues = $this->getConentType($course_info,'1');
        $exam = $this->getConentType($course_info,'3');
        $faqs = $this->getConentType($course_info,'4');
        $lesson = DB::table('lesson')->where('course_id',$id)->get();
        $advisor = DB::table('advisor')->where('id', $course->course_advisor)->first();
        return view('course')->with( 
          [
             'name'=>$name,
             'course'=>$course,
             'courses_cat'=>$courses_cat,
             'courses'=>$courses,
             'course_info'=>$course_info,
             'description'=>$description,
             'advisor'=>$advisor,
             'featues'=>$featues,
             'lesson'=>$lesson,
             'exam'=>$exam,
             'faqs'=>$faqs,
             'country'=>$country,
             'prices'=>$prices,
         ]);
    }
    public function browse($course_cat,$id)
    {
        $courses = DB::table('courses')->get();
        $courses_cat = DB::table('course_category')->get();
        $title = DB::table('course_category')->where('id',$id)->first()->name;
        return view('browse')->with( 
          [
                'title'=> $title,
                'id'=>$id,
                'courses_cat'=>$courses_cat,
                'courses'=>$courses,
         ]);
    }
    public function inquiry(Request $request)
    {
        Mail::to($request->get("email"))->send(new CourseInquiryMail());
        Mail::to("trainingcertifyme.in@gmail.com")->send(new CourseInquiryAdmin($request));
        return redirect('thankyou')->with([
            'email_result' => true,
        ]);
    }
    public function corporateinquiry(Request $request)
    {
        Mail::to($request->get("email"))->send(new CorporateTrainingMail());
        Mail::to("corporatetrainingcertifyme.in@gmail.com")->send(new CorporateTrainingMailAdmin($request));
        return redirect('thankyou')->with([
            'email_result' => true,
        ]);
    }
    public function thankyou()
    {
        return view('thankyou')->with([
            'email_result' => true,
        ]);
    }
    public function addReview(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'message' => 'required'
            ]
        );
        $courses = DB::table('courses')->where('id',$request->get('course_id'))->first();
        if ($validator->fails())
        {

            return redirect('course/'.str_sulg($courses->name).'/'.$request->get('id'))
                    ->withInput($request->all())
                    ->withErrors($validator->messages());
        }
        DB::table('reviews')->insert(
        [   
            'course_id' => $request->get('course_id'),
            'user_id' => Auth::user()->id,
            'review'=> $request->get('message'),
            'rating'=> $request->get('rating'),
            'created_at'=> NOW(),
            'updated_at'=> NOW(),
        ]
        );
        return redirect('course/'.str_slug($courses->name).'/'.$request->get('course_id'));
    }

    public function training()
    {
        $courses = DB::table('courses')->get();
        return view('training')
            ->with([
                'courses'=>$courses,
            ]);
    }
    public function search(Request $request)
    {
        $search = DB::table('courses')->where('name','LIKE',"%{$request->search}%")
                        ->get();
        $courses_cat = DB::table('course_category')->get();
        $courses = DB::table('courses')->get();
        return view('search')->with([
            'search'=>$search,
            'courses_cat'=>$courses_cat,
            'courses'=>$courses,
        ]);
    }
    public function getConentType($data,$type,$get = false)
    {
        $result = array();
        foreach($data->all() as $d)
        {
            if ($d->type == $type) {
                if ($get) {
                    $result[] = $d;
                    break;
                }
                $result[] = $d;
            }
        }
        return $result;
    }
}

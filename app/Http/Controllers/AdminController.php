<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Auth;
class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');

	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
		return view('admin.dashboard');
	}
	public function course(Request $request, $action='',$id='')
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
		$courses = DB::table('courses')->get();
		$courses_cat = DB::table('course_category')->get();
		$advisor = DB::table('advisor')->get();
		$prices = null;
		if ($action == 'update') {
			$courses = DB::table('courses')->where('id',$id)->first();
			$prices = DB::table('price')->where('course_id',$id)->first();
		}elseif ($action == 'updatecourse') {
			$courses = DB::table('course_info')->where('id',$id)->first();
		}elseif ($action == 'updatelesson') {
			$courses = DB::table('lesson')->where('id',$id)->first();
		}
		return view('admin.course',
			[
				'courses' => $courses,
				'courses_cat'=>$courses_cat,
				'prices'=>$prices,
				'advisor'=> $advisor
			])->with("action",$action);
	}
	public function addCourse(Request $request, $action='')
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
		$validator = Validator::make(
			$request->all(),
			[
				'course_cat' => 'required',
				'coursename' => 'required',
				'description' => 'required',
				'image' => 'required',
				'rating' => 'required',
			]
		);
		if ($validator->fails())
		{
			return redirect('admin/course/add')->withInput($request->all())->withErrors($validator->messages());
		}
		$imageName = DB::table('courses')->max('id') + 1;
		$imageName = $imageName.'.'. $request->file('image')->getClientOriginalExtension();
		$request->file('image')->move(
			base_path() . '/public/images/courses/', $imageName
		); 
		DB::table('courses')->insert(
		[
			'name' => $request->get('coursename'),
			'type' => $request->get('course_cat'),
			'description' => $request->get('description'),
			'image_url'=> $imageName,
			'rating'=> $request->get('rating'),
			'created_at' => NOW(),
			'updated_at' => NOW(),
		]
		);
		DB::table('price')->insert(
		[
			'course_id' => DB::table('courses')->max('id'),
			'country_in' => $request->get('pricein'),
			'country_us' => $request->get('priceus'),
			'country_uk' => $request->get('priceuk')
		]
		);
		return redirect('admin/course');
	}
	public function updateCource(Request $request)
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
		$validator = Validator::make(
			$request->all(),
			[
				'content' => 'required',
				'course_id' => 'required',
				'type' => 'required'
			]
		);
		if ($validator->fails())
		{
			return redirect('admin/course/view/'.$request->get('course_id'))->withErrors($validator->messages());
		}
		if($request->get('action') == 'create')
		{
			DB::table('course_info')->insert(
			[
				'course_id' => $request->get('course_id'),
				'type' => $request->get('type'),
				'title' => $request->get('title'),
				'content' => $request->get('content'),
				'created_at' => NOW(),
				'updated_at' => NOW(),
			]
			);
		}elseif ($request->get('action') == 'update') {
			if($request->get('type') == '1') //add course advisor
			{
				DB::table('courses')
				->where('id', $request->get('course_id'))
				->update(['course_advisor' => $request->get('content'),'updated_at'=>NOW()]);
			}
		}elseif ($request->get('action') == 'lesson') {
			$lesson = explode(".", $request->get('content'));
			$parent_lesson = null;
			if(count($lesson) == 1){
				$type = "lesson";
				$num = $lesson[0];
			}else{
				$type = "sublesson";
				$num = $lesson[0];
				$parent_lesson = $lesson[1];
			}
			DB::table('lesson')->insert(
			[
				'course_id' => $request->get('course_id'),
				'name' => $request->get('title'),
				'num' => $num,
				'parent_lesson' => $parent_lesson,
			]
			);
		}

		return redirect('admin/course/view/'.$request->get('course_id'));
	}

	public function getConentType($data,$type,$get = false)
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
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
	public function UpdateCourseInfo(Request $request,$id)
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
		$validator = Validator::make(
			$request->all(),
			[
				'content' => 'required',
			]
		);
		if ($validator->fails())
		{
			return redirect('admin/course/updatecourse/'.$id)->withErrors($validator->messages());
		}
		DB::table('course_info')
				->where('id', $id)
				->update(['content' => $request->get('content'),'title'=> $request->get('title')]);
		return redirect('admin/course/view/'.DB::table('course_info')->where('id', $id)->first()->course_id);
	}
	public function UpdateLesson(Request $request,$id)
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
		$validator = Validator::make(
			$request->all(),
			[
				'content' => 'required',
			]
		);
		if ($validator->fails())
		{
			return redirect('admin/course/updatecourse/'.$id)->withErrors($validator->messages());
		}
		$lesson = explode(".", $request->get('title'));
		$parent_lesson = null;
		if(count($lesson) == 1){
			$type = "lesson";
			$num = $lesson[0];
		}else{
			$type = "sublesson";
			$num = $lesson[0];
			$parent_lesson = $lesson[1];
		}
		DB::table('lesson')
				->where('id', $id)
				->update([
					'name' => $request->get('content'),
					'num' => $num,
					'parent_lesson' => $parent_lesson,
					'type' => $type,
				]);
		return redirect('admin/course/view/'.DB::table('lesson')->where('id', $id)->first()->course_id);
	}
	public function viewCourse(Request $request,$id)
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
		$courses = DB::table('courses')->where('id', $id)->first();
		$course_info = DB::table('course_info')->where('course_id',$id)->get();
		$lesson = DB::table('lesson')->where('course_id',$id)->get();
		$advisor = DB::table('advisor')->where('id', $courses->course_advisor)->first();
		$advisors = DB::table('advisor')->get();
		$featues = $this->getConentType($course_info,'1');
		$description = $this->getConentType($course_info,'2');
		$exam = $this->getConentType($course_info,'3');
		$faqs = $this->getConentType($course_info,'4');
		return view('admin.form.editcourse',
			[
				'courses' => $courses,
				'id' => $id,
				'featues'=>$featues,
				'advisor'=>$advisor,
				'advisors'=>$advisors,
				'description'=>$description,
				'lesson'=>$lesson,
				'exam'=>$exam,
				'faqs'=>$faqs,
			]
		);
	}
	public function onlineexam(Request $request, $action = '',$id=''){
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
		if($action == 'view' || $action == 'edit')
		{
			$examcourse  = DB::table('courses')->join('exam', 'courses.id', '=', 'exam.course_id')->first();
		}
		else
		{
			$examcourse  = DB::table('courses')->join('exam', 'exam.course_id', '=', 'courses.id')->get();
		}
		$course  = DB::table('courses')->get();
		return view('admin.exam',
				[
					'type' => 'online',
					'action' => $action,
					'courses'=>$course,
					'examcourse'=>$examcourse
				]
		);
	}
	public function users()
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
		$users = DB::table('users')->where('admin', 'n')->get();
		return view('admin.users', ['users' => $users]);
	}
	public function addExam(Request $request)
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
		$validator = Validator::make(
			$request->all(),
			[
				'course_id' => 'required',
				'questions' => 'required',
				'starttime' => 'required',
				'endtime' => 'required',
				'exam_date' => 'required'
			]
		);
		if ($validator->fails())
		{
			return redirect('admin/onlineexam/add')->withInput($request->all())->withErrors($validator->messages());
		}
		DB::table('exam')->insert(
			[
				'course_id' => $request->get('course_id'),
				'starttime'=> $request->get('starttime'),
				'questions'=> $request->get('questions'),
				'endtime'=> $request->get('endtime'),
				'exam_date'=> $request->get('exam_date'),
				'created_at'=> NOW(),
				'updated_at'=> NOW(),
			]
			);
		return redirect('admin/onlineexam');
	}

	public function editExam(Request $request,$id)
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
		$validator = Validator::make(
			$request->all(),
			[
				'course_id' => 'required',
				'questions' => 'required',
				'starttime' => 'required',
				'endtime' => 'required',
				'exam_date' => 'required'
			]
		);
		if ($validator->fails())
		{
			return redirect('admin/onlineexam/view/'.$id)->withInput($request->all())->withErrors($validator->messages());
		}
		DB::table('exam')->where('id', $id)->update(
			[
				'course_id' => $request->get('course_id'),
				'starttime'=> $request->get('starttime'),
				'questions'=> $request->get('questions'),
				'endtime'=> $request->get('endtime'),
				'exam_date'=> $request->get('exam_date'),
				'updated_at'=> NOW(),
			]);
		return redirect('admin/onlineexam/view/'.$id);
	}
	public function questions(Request $request,$action = '',$type = '')
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
		$courses = null;
		$practiceQuestionCount = DB::table('questions')->where('examtype', 'practice')->count();
		$OnlineQuestionCount = DB::table('questions')->where('examtype', 'online')->count();
		if ($type == 'practice') {
			$courses = DB::table('courses')->get();
		}
		return view('admin.questions',
				[
					'type' => $type,
					'action' => $action,
					'practiceQuestionCount' => $practiceQuestionCount,
					'OnlineQuestionCount' => $OnlineQuestionCount,
					'courses'=>$courses,
					// 'examcourse'=>$examcourse
				]
		);
	}
	public function advisor(Request $request)
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
		$advisor = DB::table('advisor')->get();
		return view('admin.advisor', ['advisor' => $advisor]);
	}
	public function UpdateCourse(Request $request,$id)
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
		$validator = Validator::make(
			$request->all(),
			[
				'course_cat' => 'required',
				'coursename' => 'required',
				'description' => 'required',
				'rating' => 'required',
			]
		);
		if ($validator->fails())
		{
			return redirect('admin/course/update/'.$id)->withInput($request->all())->withErrors($validator->messages());
		}
		if ($request->file('image') != "") {
			$imageName = $id.'.'. $request->file('image')->getClientOriginalExtension();
			$request->file('image')->move(
				base_path() . '/public/images/courses/', $imageName
			);
			DB::table('courses')->where('id', $id)->update(
			[
				'image_url'=> $imageName,
			]
			);
		}

		DB::table('courses')->where('id', $id)->update(
		[
			'name' => $request->get('coursename'),
			'type' => $request->get('course_cat'),
			'description' => $request->get('description'),
			'rating'=> $request->get('rating')
		]
		);
		if (DB::table('price')->where('course_id', $id)->count() == 1) {
			DB::table('price')->where('course_id', $id)->update(
			[
				'country_in' => $request->get('pricein'),
				'country_us' => $request->get('priceus'),
				'country_uk' => $request->get('priceuk')
			]
			);
		}else{
			DB::table('price')->insert(
			[
				'course_id' => $id,
				'country_in' => $request->get('pricein'),
				'country_us' => $request->get('priceus'),
				'country_uk' => $request->get('priceuk')
			]
			);
		}

		return redirect('/admin/course');
	}
	public function addquestions(Request $request)
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}

		$validator = Validator::make(
			$request->all(),
			[
				'question' => 'required',
				'option1' => 'required',
				'option2' => 'required'
			]
		);
		if ($validator->fails())
		{
			dd($validator->messages());
			return redirect('/admin/questions/add/practice')->withErrors();
		}
		//add to database
		DB::table('questions')->insert(
			[
				'examtype' => $request->get('type'),
				'course_id'=> $request->get('course_id'),
				'question'=> $request->get('question'),
				'option1'=> $request->get('option1'),
				'option2'=> $request->get('option2'),
				'option3'=> $request->get('option3'),
				'option4'=> $request->get('option4'),
				'answer'=> $request->get('answer'),
				'created_at' =>NOW(),
				'updated_at' => NOW()
			]
			);
		return redirect('admin/questions');
	}
	public function addadvisor(Request $request)
	{
		if(Auth::user()->admin == 'n'){
			return redirect('/profile');
		}
		$validator = Validator::make(
			$request->all(),
			[
				'name' => 'required',
				'post' => 'required',
				'description' => 'required'
			]
		);
		if ($validator->fails())
		{
			$advisor = DB::table('advisor')->get();
			return redirect('admin.advisor', ['advisor' => $advisor])->withInput($request->all())->withErrors($validator->messages());
		}
		$imageName = 0;
		if ($request->image_name != '') {
			$imageName = DB::table('advisor')->max('id') + 1;
			$imageName = $imageName.'.'. $request->file('image')->getClientOriginalExtension();
			$request->file('image')->move(
				base_path() . '/public/images/advisor/', $imageName
			);
		}
		DB::table('advisor')->insert(
			[
				'name' => $request->get('name'),
				'image_url'=> $imageName,
				'post'=> $request->get('post'),
				'description'=> $request->get('description')
			]
			);
		return redirect('admin/advisor');
	}
}

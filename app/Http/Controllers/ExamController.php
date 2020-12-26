<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class ExamController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function index(Request $request,$type)
	{

		$courses_cat = DB::table('course_category')->get();
		if ($type== 'online') {
			$examcourse  = DB::table('courses')->join('exam', 'exam.course_id', '=', 'courses.id')->whereDate('exam_date', '>=', date('Y-m-d'))->get();
		}else{
			$examcourse  = DB::table('courses')->get();
		}
		return view('exam',
				[
					'type'=>$type,
					'courses_cat'=>$courses_cat,
					'examcourse'=>$examcourse 
				]
		);
	}
	public function start($type, $name, $id)
	{
		$exam_info["type"] = $type;
		$exam_info["id"] = $id;
		session(['exam_info'=>$exam_info]);
		return view('exam.start',
				[
					'type'=> $type,
					'id'=>$id
				]
		);
	}


	public function preparequestions($type, $name, $id)
	{
		//create new session and add questions in session
		$questions = DB::table('questions')
			->where('examtype',$type)
			->where('course_id',$id)
			->limit(30)
			->get();
		$session_questions =array();
		$question_status =array();
		foreach ($questions as $q) {
			$s_q['question'] = $q->question;
			$s_q['q_id'] = $q->id;
			$s_q['option1'] = $q->option1;
			$s_q['option2'] = $q->option2;
			$s_q['option3'] = $q->option3;
			$s_q['option4'] = $q->option4;
			$s_q['user_answer'] = null;
			$question_status[] = 0;
			$session_questions[] = $s_q;
		}
		session(['questions'=>$session_questions]);
		session(['question_status'=>$question_status]);
		//redirect to question
		return redirect('exam/question/1');
	}

	public function showquestion($num)
	{
		if(count(session('questions'))+1 == $num){
			return redirect('exam/submit');
		}
		$question = session('questions')[$num-1];
		$question_status = session('question_status');
		return view('exam.question')->with([
			'num'=>$num,
			'question'=> $question['question'],
			'option1'=> $question['option1'],
			'option2'=> $question['option2'],
			'option3'=> $question['option3'],
			'option4'=> $question['option4'],
			'user_answer' => $question['user_answer'],
			'question_status' => $question_status,
		]);
	}

	public function save_answer(Request $request)
	{
		$x = $request->get("num")-1;
		$questions = session('questions');
		$question_status = session('question_status');
		if ($request->get("answer") != null) {
			$question_status[$x] = 1;
			$questions[$x]['user_answer'] = $request->get("answer");
		}
		session(['question_status'=>$question_status]);
		session(['questions'=>$questions]);
		//session('questions')[$request->get("num")-1]["user_answer"] = $request->get("answer");
		return "true";
		//return response()->json(session('questions')[$x]);
	}

	public function submit()
	{
		//answer summery
		$question_status = session('question_status');
		return view('exam.submit')->with([
			'question_status' => $question_status,
		]);
	}

	public function confirm_submit(Request $request)
	{
		$questions = session('questions');
		$question_status = session('question_status');
		$marks = 0;
		$total = 0;
		$attempt_questions = 0;
		foreach ($questions as $q) {
			if ($question_status[$total] != 0) {
				$attempt_questions++;
			}
			$total++;
			$answer = DB::table('questions')
				->where('id',$q["q_id"])
				->first()->answer;
			if ($answer == $q["user_answer"]) {
				$marks++;
			}
		}
		DB::table("results")->insert(
			[
				'course_id' => session("exam_info")["id"],
				'user_id' => Auth::user()->id,
				'result' => $marks,
				'exam_type'=> session("exam_info")["type"],
				'attempt_questions' => $attempt_questions,
				'total_questions' => $total,
				'submit_time' => NOW(),
			]
		);
		$id = DB::table("results")
			->where("user_id",Auth::user()->id)
			->orderBy('id', 'desc')
			->first()->id;
		return redirect("/exam/results/".$id);
	}

	public function results($id)
	{
		$result = DB::table("results")->where("id",$id)->where("user_id",Auth::user()->id)->first();
		return view('/exam/result')->with([
			'result'=>$result,
			'grade'=>'Good',
		]);
	}
}

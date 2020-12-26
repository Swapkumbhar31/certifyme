@extends('layouts.admin')
@section('content')
<div class="well" style="min-height: 500px">
	@if($action == 'view')
		<h1>{{$examcourse->name}}</h1>
		<ul>
			<li>Date : {{$examcourse->exam_date}}</li>
			<li>Exam ID : {{$examcourse->id}}</li>
			<li>Start Time : {{$examcourse->starttime}}</li>
			<li>End Time : {{$examcourse->endtime}}</li>
			<li>Number of Questions : {{$examcourse->questions}}</li>
		</ul>
		<a href="/admin/{{$type}}exam/edit/{{$examcourse->id}}" class="btn btn-theme">Edit Test</a>
	@elseif($action == 'edit')
		@include('admin.form.editonlinetest')
	@elseif($action == 'add')
		@include('admin.form.addquestion')
	@else
		<h1>Question manegment</h1>	
		<h3>Pratice Question Count : {{$practiceQuestionCount}}</h3>
		<a href="/admin/questions/add/practice" class="btn btn-theme">Add Questions</a>
		<h3>Online Question Count : {{$OnlineQuestionCount}}</h3>
		<a href="/admin/questions/add/online" class="btn btn-theme">Add Questions</a>
	@endif	
</div>
@endsection()
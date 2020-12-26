@extends('layouts.app')

@section('content')

<div class="container">
	<div class="well text-center">
		<h2>Results</h2>
			<h3>{{$grade}}</h3>
			<p>Score : {{$result->result}}/{{$result->total_questions}}</p>
			<p>Attempted Question : {{$result->attempt_questions}}</p>
			<p>Exam Type : {{$result->exam_type}}</p>
		<br>
		<a href="/user/profile" class="btn btn-info">Home</a>
	</div>	
</div>
@include('inc.footer')
@endsection()
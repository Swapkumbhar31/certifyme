@extends('layouts.app')

@section('content')

<div class="container">
	<div class="well">
		<h2>Confirm Submit</h2>
		<p>Summery of Answers</p>
		<div id="questions_status">
			@php ($total = 1)
			@foreach($question_status as $a)
			@if($a == 1)
			<div class="solved btn-jump" data-jumb="{{$total}}">{{$total++}}</div>
			@else
			<div class="unsolved btn-jump" data-jumb="{{$total}}">{{$total++}}</div>
			@endif
			@endforeach
		</div>
		<br>
		{!! Form::open()!!}
		{{Form::submit('Submit',['class'=>'btn btn-danger'])}}
		{!!Form::close()!!}
	</div>	
</div>

@include('inc.footer')
@endsection()
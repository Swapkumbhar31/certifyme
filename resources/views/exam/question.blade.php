@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 well">
			<h4>Q <span id="num">{{$num}}</span>. <span id="question">{{$question}}</span></h4>
			{!! Form::open(['id'=>'frm_q'])!!}
			<div class="radio">
				<label>{{Form::radio('answer','1',$user_answer==1)}} <span id="option1">{{$option1}}</span></label>
			</div>
			<div class="radio">
				<label>{{Form::radio('answer','2',$user_answer==2)}} <span id="option2">{{$option2}}</span></label>
			</div>
			<div class="radio">
				<label>{{Form::radio('answer','3',$user_answer==3)}} <span id="option3">{{$option3}}</span></label>
			</div>
			<div class="radio">
				<label>{{Form::radio('answer','4',$user_answer==4)}} <span id="option4">{{$option4}}</span></label>
			</div>
			{{Form::hidden('num',$num,['id'=>'num'])}}
			<button id="btn_prev {{$num==1?'disabled':''}}" class="btn btn-info"  {{$num==1?'disabled':''}}>Prev</button>
			<div class="pull-right">
				<button class="btn btn-info {{$num==count($question_status)?'disabled':''}}" id="btn_next" {{$num==count($question_status)?'disabled':''}}>Next</button>
				<button class="btn btn-danger" id="btn_submit">Submit</button>
			</div> 
			
			{!!Form::close()!!}
		</div>

		<div class="col-md-4">
			<div class="well">
				<h3>Question Summery</h3>
				<div id="questions_status">
					@php ($total = 1)
					@foreach($question_status as $a)
						@if($a == 1)
							<div class="solved btn-jump" data-jump="{{$total}}">{{$total++}}</div>
							@else
							<div class="unsolved btn-jump" data-jump="{{$total}}">{{$total++}}</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

@include('inc.footer')
@endsection()
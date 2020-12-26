@if($errors->count()!=0)
<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="container-fuild">
	<div class="row"> 
		{!! Form::open()!!}
		@php ($arr = array())
		@foreach($courses->all() as $c)
		@php ($arr[$c->id] =  $c->name)
		@endforeach
		<div class="col-md-6"> 
			{{Form::label('course_id','Course Name')}}
			{{Form::select('course_id', $arr, $examcourse->course_id, ['class'=>'form-control','placeholder' => 'Select Course'])}}
		</div>
		<div class="col-md-6">
			{{Form::label('questions','Number of Questions')}}
			{{Form::number('questions',$examcourse->questions,['class'=>'form-control','placeholder'=>'Number of Questions'])}}
		</div>
		<div class="col-md-6">
			{{Form::label('exam_date','Date of Exam')}}
			<div class="bfh-datepicker" data-format="y-m-d" data-name="exam_date" data-date="{{substr($examcourse->exam_date,0,10)}}">
			</div>
			<br>
		</div>
		<div class="col-md-12">
		</div>
		<div class="col-md-6">
			{{Form::label('starttime','Start time')}}
			<div class="bfh-timepicker" data-name="starttime" data-time="{{substr($examcourse->starttime,0,5)}}">
			</div>
		</div>
		<div class="col-md-6">
			{{Form::label('endtime','End time')}}
			<div class="bfh-timepicker" data-name="endtime" data-time="{{substr($examcourse->endtime,0,5)}}">
			</div>
		</div>
		<div class="col-md-12">
			<br>
			{{Form::submit('Add Test',['class'=>'btn btn-theme'])}}
		</div>
		{!!Form::close()!!}
	</div>
</div>
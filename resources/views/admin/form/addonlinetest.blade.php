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
			{{Form::select('course_id', $arr, null, ['class'=>'form-control','placeholder' => 'Select Course'])}}
		</div>
		<div class="col-md-6">
			{{Form::label('questions','Number of Questions')}}
			{{Form::number('questions','',['class'=>'form-control','placeholder'=>'Number of Questions'])}}
		</div>
		<div class="col-md-6">
			{{Form::label('exam_date','Date of Exam')}}
			<div class="bfh-datepicker" data-format="y-m-d" data-name="exam_date" data-date="today">
			</div>
			<br>
		</div>
		<div class="col-md-12">
		</div>
		<div class="col-md-6">
			{{Form::label('starttime','Start time')}}
			<div class="bfh-timepicker" data-name="starttime">
			</div>
		</div>
		<div class="col-md-6">
			{{Form::label('endtime','End time')}}
			<div class="bfh-timepicker" data-name="endtime">
			</div>
		</div>
		<div class="col-md-12">
			<br>
			{{Form::submit('Add Test',['class'=>'btn btn-theme'])}}
		</div>
		{!!Form::close()!!}
	</div>
</div>
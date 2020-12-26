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
		{!! Form::open(['url'=>'/admin/questions/add'])!!}
		@php ($arr = array())
		@foreach($courses->all() as $c)
		@php ($arr[$c->id] =  $c->name)
		@endforeach
		{{Form::hidden('type',$type)}}
		<div class="col-md-6"> 
			{{Form::label('course_id','Select Course Name')}}
			{{Form::select('course_id', $arr, null, ['class'=>'form-control','placeholder' => 'Select Course'])}}
		</div>
		<div class="col-md-12"></div>
		<div class="col-md-6"> 
			{{Form::label('question','Question')}}
			{{Form::textarea('question','',['class'=>'form-control','placeholder'=>'Enter Course Name','size' => '30x5'])}}
		</div>
		<div class="col-md-12"></div>

		<div class="col-md-6">
			{{Form::label('option1','Option 1')}}
			{{Form::text('option1','',['class'=>'form-control','placeholder'=>'Enter Course Name'])}}
		</div>
		<div class="col-md-6">
			{{Form::label('option2','Option 2')}}
			{{Form::text('option2','',['class'=>'form-control','placeholder'=>'Enter Course Name'])}}
		</div>
		<div class="col-md-6">
			{{Form::label('option3','Option 3')}}
			{{Form::text('option3','',['class'=>'form-control','placeholder'=>'Enter Course Name'])}}
		</div>
		<div class="col-md-6">
			{{Form::label('option4','Option 4')}}
			{{Form::text('option4','',['class'=>'form-control','placeholder'=>'Enter Course Name'])}}
		</div>
		<div class="col-md-6">
			{{Form::select('answer', ['1' => 'Option 1', '2' => 'Option 2', '3' => 'Option 3', '4' => 'Option 4'], null, ['class'=>'form-control','placeholder' => 'Select Answer'])}}
		</div>
		<div class="col-md-12">
			<br>
			{{Form::submit('Add Question',['class'=>'btn btn-theme'])}}
		</div>
		{!!Form::close()!!}
	</div>
</div>
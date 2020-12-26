<div class="card text-center">
	<h2>{{$course->name}}</h2>
	<h2>{{$prices}}</h2>
	{!! Form::open(['url' => 'course/addcart'])!!}
	{{Form::hidden('id',$course->id)}}
	{{Form::submit('Enroll',['class'=>'btn btn-theme btn-block'])}}
	{!!Form::close()!!}
</div>
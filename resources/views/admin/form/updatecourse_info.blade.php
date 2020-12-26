{{$courses->type}}

{!! Form::open()!!}
@if ($courses->type != 1)
{{Form::label('title','Course Description Title')}}
{{Form::text('title',$courses->title,['class'=>'form-control','placeholder'=>'Enter Key Features','required'=>'required'])}}
@endif
{{Form::label('content','Course Description')}}
{{Form::textarea('content',$courses->content,['class'=>'form-control','placeholder'=>'Enter Key Features'])}}
{{Form::hidden('type','2')}}
{{Form::hidden('course_id',$courses->id)}}
{{Form::submit('Add',['class'=>'btn btn-theme'])}}
{!!Form::close()!!}
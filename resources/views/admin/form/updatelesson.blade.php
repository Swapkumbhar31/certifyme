{!! Form::open()!!}
@if($courses->type == 'lesson')
{{Form::label('title','Lesson Number')}}
{{Form::text('title',$courses->num,['class'=>'form-control','placeholder'=>'Enter Lesson Number','required'=>'required'])}}
@elseif($courses->type == 'sublesson')
{{Form::label('title','Lesson Number')}}
{{Form::text('title',$courses->num.'.'.$courses->parent_lesson,['class'=>'form-control','placeholder'=>'Enter Lesson Number','required'=>'required'])}}
@endif
{{Form::label('content','Lesson name')}}
{{Form::textarea('content',$courses->name,['class'=>'form-control','placeholder'=>'Enter Lesson Name'])}}
{{Form::hidden('type','2')}}
{{Form::hidden('course_id',$courses->id)}}
{{Form::submit('Add',['class'=>'btn btn-theme'])}}
{!!Form::close()!!}
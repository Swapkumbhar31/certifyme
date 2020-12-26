
<h3 class="lead">Course description 
	<a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#decription">
		<i class="fa fa-pencil" aria-hidden="true"></i>
	</a>
</h3>
@if(count($description) > 0)
<div class="panel-group" id="accordion">
	@php ($x = 1)
	@foreach($description as $a)
	<div class="panel my-panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$x}}">{{$a->title}}</a>
				<a class="btn btn-danger btn-xs" href="/admin/course/updatecourse/{{$a->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				<a class="btn btn-danger btn-xs" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
			</h4>
		</div>
		<div id="collapse{{$x}}" class="panel-collapse collapse panel-body">
			<p>{{$a->content}}</p>
		</div>
	</div>
	@php ($x++)
	@endforeach
</div>
@else
<span class="alert alert-danger">
	No features add.
</span>
@endif
<br>

<div id="decription" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Course description</h4>
			</div>
			<div class="modal-body">
				{!! Form::open()!!}
				{{Form::label('title','Course Description Title')}}
				{{Form::text('title','',['class'=>'form-control','placeholder'=>'Enter Key Features','required'=>'required'])}}
				{{Form::label('content','Course Description')}}
				{{Form::textarea('content','',['class'=>'form-control','placeholder'=>'Enter Key Features'])}}
				{{Form::hidden('type','2')}}
				{{Form::hidden('action','create')}}
				{{Form::hidden('course_id',$id)}}
				{{Form::submit('Add',['class'=>'btn btn-theme'])}}
				{!!Form::close()!!}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
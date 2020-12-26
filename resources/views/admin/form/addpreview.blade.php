
<h3 class="lead">
	Course preview 
	<a href="#" data-toggle="modal" data-target="#decription-single">
		<i class="fa fa-pencil" aria-hidden="true"></i>
	</a>
</h3>
@if(count($lesson) > 0)
<div class="panel-group" id="lesson">
	@php ($x = 1)
	@foreach($lesson as $a)
		@if($a->type == 'lesson')
		<div class="panel my-panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a data-toggle="collapse" data-parent="#lesson" href="#lesson{{$x}}">
						Lesson {{$a->num}} : {{$a->name}}
						<a class="btn btn-danger btn-xs" href="/admin/course/updatelesson/{{$a->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
						<a class="btn btn-danger btn-xs" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
					</a>
				</h4>
			</div>
			<div id="lesson{{$x}}" class="panel-collapse collapse panel-body">
				@foreach($lesson as $b)
					@if($b->type == 'sublesson' && $b->num == $a->num)
						<p>
							Lesson {{$b->num}}.{{$b->parent_lesson}} : {{$b->name}}
							<a class="btn btn-danger btn-xs" href="/admin/course/updatelesson/{{$b->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
							<a class="btn btn-danger btn-xs" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
						</p>
					@endif
				@endforeach
			</div>
		</div>
		@endif
	@php ($x++)
	@endforeach
</div>
@else
<span class="alert alert-danger">
	No Preview added.
</span>
@endif
<br>

<div id="decription-single" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Course preview</h4>
			</div>
			<div class="modal-body">
				{!! Form::open()!!}
				{{Form::label('title','Lesson Name')}}
				{{Form::text('title','',['class'=>'form-control','placeholder'=>'Enter Lesson Name','required'=>'required'])}}
				{{Form::label('content','Lesson Number')}}
				{{Form::text('content','',['class'=>'form-control','placeholder'=>'Enter Lesson number','required'=>'required'])}}
				{{Form::hidden('type','2')}}
				{{Form::hidden('action','lesson')}}
				{{Form::hidden('course_id',$id)}}
				{{Form::hidden('upload','false')}}
				{{Form::submit('Add',['class'=>'btn btn-theme'])}}
				{!!Form::close()!!}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<div id="decription-multiple" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add Course description</h4>
			</div>
			<div class="modal-body">
				{!! Form::open(['files' => true])!!}
				{{Form::label('csv','Upload CSV')}}
				<div class="input-group input-file" name="csv">
		    		{{Form::text('csv','',['class'=>'form-control','placeholder'=>'Choose CSV file'])}}	
		            <span class="input-group-btn">
		        		<button class="btn btn-default btn-choose" type="button">Choose</button>
		    		</span>
				</div>
				{{Form::hidden('upload','true')}}
				<br>
				{{Form::submit('Add',['class'=>'btn btn-theme'])}}
				{!!Form::close()!!}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
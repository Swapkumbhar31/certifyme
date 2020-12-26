@extends('layouts.admin')
@section('content')
<div class="well" style="min-height: 500px">
	<a href="#" class="btn btn-theme" data-toggle="modal" data-target="#advisor">Add</a>
	<br><br>
	@if($errors->count()!=0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
	@if($advisor->count() == 0)
			<p>Zero results</p>
		@else
			<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Advisor Name</th>
							<th>Post</th>
							<th>Description</th>
							<!-- <th>Action</th> -->
						</tr>
					</thead>
					<tbody>
						@php ($x = 1)
						@foreach($advisor as $course)
							<tr>
								<td>{{$x++}}</td>
								<td>{{$course->name}}</td>
								<td>{{$course->post}}</td>
								<td width="50%">{{substr($course->description,0,150)}}...</td>
								<!-- 
								<td>
									<a class="btn btn-danger" href="/admin/course/view/{{$course->id}}" data-toggle="tooltip" title="View"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a class="btn btn-danger" href="/admin/course/update/{{$course->id}}" data-toggle="tooltip" title="Update"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>
									<a class="btn btn-danger" href="#" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</td> -->
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@endif
	<div id="advisor" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Advisor</h4>
				</div>
				<div class="modal-body">
					{!! Form::open(['files' => true])!!}
					{{Form::label('name','Advisor Name')}}
					{{Form::text('name','',['class'=>'form-control','placeholder'=>'Enter Advisor Name'])}}
					{{Form::label('post','Advisor Post')}}
					{{Form::text('post','',['class'=>'form-control','placeholder'=>'Enter Advisor Post'])}}
					{{Form::label('image_name','Select Image')}}
					<div class="input-group input-file" name="image">
			    		{{Form::text('image_name','',['class'=>'form-control','placeholder'=>'Choose Image file'])}}	
			            <span class="input-group-btn">
			        		<button class="btn btn-default btn-choose" type="button">Choose</button>
			    		</span>
					</div>
					{{Form::label('description','Description')}}
					{{Form::textarea('description','',['class'=>'form-control','placeholder'=>'About Adviosr','size' => '30x5'])}}
					{{Form::submit('Add',['class'=>'btn btn-theme'])}}
					{!!Form::close()!!}
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection()
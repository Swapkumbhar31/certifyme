@extends('layouts.admin')
@section('content')
<div class="well" style="min-height: 500px">
	
	@if ($action == 'add')
		@include('admin.form.addcourse')
	@elseif ($action == 'update')
		@include('admin.form.updatecourse')
	@elseif ($action == 'updatecourse')
		@include('admin.form.updatecourse_info')
	@elseif ($action == 'updatelesson')
		@include('admin.form.updatelesson')
	@else
		@if($courses->count() == 0)
			<p>Zero results</p>
		@else
			<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Course Name</th>
							<th>Description</th>
							<th>Image</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@php ($x = 1)
						@foreach($courses as $course)
							<tr>
								<td>{{$x++}}</td>
								<td>{{$course->name}}</td>
								<td width="40%">{{substr($course->description,0,100)}}...</td>
								<td>{{$course->image_url}}</td>
								<td>
									<a class="btn btn-danger" href="/admin/course/view/{{$course->id}}" data-toggle="tooltip" title="View"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									<a class="btn btn-danger" href="/admin/course/update/{{$course->id}}" data-toggle="tooltip" title="Update"><i class="fa fa-cloud-download" aria-hidden="true"></i></a>
									<a class="btn btn-danger" href="#" data-toggle="tooltip" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@endif
	<a class="btn btn-theme" href="/admin/course/add">Add Course</a>
	@endif
	
</div>
@endsection()
@extends('layouts.admin')
@section('content')
<div class="well" style="min-height: 500px">
	@if($action == 'view')
		<h1>{{$examcourse->name}}</h1>
		<ul>
			<li>Date : {{$examcourse->exam_date}}</li>
			<li>Exam ID : {{$examcourse->id}}</li>
			<li>Start Time : {{$examcourse->starttime}}</li>
			<li>End Time : {{$examcourse->endtime}}</li>
			<li>Number of Questions : {{$examcourse->questions}}</li>
		</ul>
		<a href="/admin/{{$type}}exam/edit/{{$examcourse->id}}" class="btn btn-theme">Edit Test</a>
	@elseif($action == 'edit')
		@include('admin.form.editonlinetest')
	@elseif($action == 'add')
		@include('admin.form.addonlinetest')
	@else
		<a href="/admin/{{$type}}exam/add" class="btn btn-theme"> Add Test</a>
		<br><br>
		@if($examcourse->count() == 0)
			<h1 class="text-center">Zero results</h1>
		@else
			<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>Course Name</th>
							<th>No. of. Questions</th>
							<th>Date</th>
							<th>Start Time</th>
						</tr>
					</thead>
					<tbody>
						@php ($x = 1)
						@foreach($examcourse as $c)
							<tr class="clickable-row"  data-href='/admin/onlineexam/view/{{$c->id}}'>
								<td>{{$x++}}</td>
								<td>{{$c->name}}</td>
								<td>{{$c->questions}}</td>
								<td>{{$c->exam_date}}</td>
								<td>{{$c->starttime}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@endif	
	@endif	
</div>
@endsection()
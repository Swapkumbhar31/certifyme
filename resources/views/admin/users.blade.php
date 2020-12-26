@extends('layouts.admin')
@section('content')
	<div class="well" style="min-height: 500px">
		@if($users->count() == 0)
			<p>Zero results</p>
		@else
			<div class="table-responsive">
				<table class="table table-hover table-striped table-bordered">
					<thead>
						<tr>
							<th>Sr. No.</th>
							<th>User Name</th>
							<th>Email</th>
							<th>Phone</th>
							<!-- <th>Action</th> -->
						</tr>
					</thead>
					<tbody>
						@php ($x = 1)
						@foreach($users as $user)
							<tr>
								<td>{{$x++}}</td>
								<td>{{$user->fname}} {{$user->lname}}</td>
								<td>{{$user->email}}</td>
								<td>{{$user->phone}}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@endif
	</div>
@endsection()
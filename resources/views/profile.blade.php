@extends('layouts.app')
@section('content')
<div class="container-fluid">
	<!-- @include('inc.underconstration') -->
	<div class="row">
		<div class="col-md-3">
			@include('user.sidenav')
		</div>
		<div class="col-md-9">
			<div class="well" style="min-height: 500px">
				@php ($a = explode('/',Request::url()))
				@php ($a = isset($a[4])?$a[4]:'')
				@if($a == 'profile')
					@include('user.home')
				@elseif($a == 'course')
					@include('user.course')
				@elseif($a == 'results')
					@include('user.results')
				@elseif($a == 'setting')
					@include('user.setting')
				@elseif($a == 'transactions')
					@include('user.transactions')
				@endif
			</div>
		</div>
	</div>
</div>
@include('inc.footer')
@endsection

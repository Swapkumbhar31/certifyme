@extends('layouts.master')
@section('title')
	CertifyMe : {{$course->name}}
@endsection
@section('description')
	{{$course->description}}
@endsection
@section('content')
	@section('banner')
	<header class="masthead">
		@include('inc.banner')
	</header>
	@endsection
	@include('inc.titlebar')
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				@include('inc.description')
			</div>
			<div class="col-sm-3">
				<br>
		     	@include('inc.sidenav')
		  </div>  
		</div>
	</div>
	@section('script')
	<script>
		$('#nav').affix({
			offset: {
				top: $('header').height()
			}
		});	
	</script>
	@endsection
@endsection

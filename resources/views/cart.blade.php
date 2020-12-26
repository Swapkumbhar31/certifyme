@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9 col-md-offset-2">
			@include('inc.cart')
		</div>
	</div>
</div>
@include('inc.footer')
@endsection
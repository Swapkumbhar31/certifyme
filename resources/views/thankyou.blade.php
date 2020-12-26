@extends('layouts.app')
@section('content')
@if($email_result)
<div class="container">
	<div class="alert alert-success">
		<p>Email send successfully.</p>
	</div> 
</div>
@endif
@include('inc.footer')
@endsection
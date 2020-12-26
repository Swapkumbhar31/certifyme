@extends('layouts.admin')
@section('content')
<div class="well" style="min-height: 500px">
	@if($errors->count()!=0)
	<div class="alert alert-danger">
		<ul>
			@foreach($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
	@endif
	@include('admin.form.addkeyfeatures')
	@include('admin.form.addadvisor')
	@include('admin.form.adddescription')
	@include('admin.form.addpreview')
	@include('admin.form.addexamandcertification')
	@include('admin.form.addFAQs')
</div>
@endsection
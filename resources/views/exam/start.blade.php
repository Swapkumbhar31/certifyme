@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 well">
			<h2>Hello {{Auth::user()->fname}},</h2>
			<p>Do you really want to start "Test type" Test on "Test Name"?</p>
			<p>Rules List</p>
			<ul>
				<li>First List</li>
				<li>Second List</li>
				<li>Third List</li>
				<li>Fourth List</li>
				<li>Fifth List</li>
			</ul>
			{!! Form::open()!!}
			{{Form::hidden('id',$id)}}
			{{Form::submit('Start',['class'=>'btn btn-theme center-block btn-lg'])}}
			{!!Form::close()!!}
		</div>
	</div>
</div> 



@include('inc.footer')
@endsection()
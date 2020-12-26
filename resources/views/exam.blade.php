@extends('layouts.app')

@section('content')
<br>
<div class="container">
	
	<div class="row">
		<div class="col-md-12">
			@if($type == 'Coming soon')
			<div class="jumbotron text-center">
				<h1>This Feature Coming soon</h1>
			</div> 
			@elseif($type == 'online' || $type == 'practice')
				@include('exam.allexams')
			@endif
		</div>
	</div>
	
</div>
<br><br>
@include('inc.footer')
@endsection()
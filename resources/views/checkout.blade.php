@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9 col-md-offset-2">
			{!! Form::open(['url'=>'checkout'])!!}
			<div class="panel-group" id="accordion">
				@php ($a = explode('/',Request::url()))
				@php ($a = isset($a[3])?$a[3]:'')
				@if($a != 'cart')
					@include('inc.cart')
				@endif
				<div class="panel panel-default">
					<div class="panel-heading">
						<span><i class="fa fa-user" aria-hidden="true"></i></span>
						<h4 class="panel-title">
							<p >Learner Details</p>
						</h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse {{ $a=='cart' ? 'in' : '' }}">
						<br>
						<div class="container-fluid">
							<div class="row">
								@guest
								<div class="col-md-8 col-md-offset-2">
									{{Form::label('fname','First Name')}}
									{{Form::text('fname','',['class'=>'form-control','placeholder'=>'Enter first name'])}}
									{{Form::label('lname','Last Name')}}
									{{Form::text('lname','',['class'=>'form-control','placeholder'=>'Enter last name'])}}
									{{Form::label('phone','Phone Number')}}
									{{Form::text('phone','',['class'=>'input-medium bfh-phone form-control','data-format'=>'+91 ddddd-ddddd','placeholder'=>'Enter Phone Number'])}}
									{{Form::label('email','Email')}}
									{{Form::text('email','',['class'=>'form-control','placeholder'=>'Enter Email address'])}}
									{{Form::label('password','Password')}}
									{{Form::hidden('type','create')}}
									{{Form::password('password',['class'=>'form-control','placeholder'=>'Enter Password'])}}
									<p><a href="/login">Already have an account?</a></p>
								</div>
								@else
								<div class="col-md-8 col-md-offset-2">
									@if (isset($errors))
										@foreach($errors->all() as $error)
											<p class="alert alert-danger">{{$error}}</p>
										@endforeach
									@endif
									<h2>Hey {{Auth::user()->fname}},</h2>
									{{Form::hidden('type','check')}}
									{{Form::label('password','Re-enter Password')}}
									{{Form::password('password',['class'=>'form-control','placeholder'=>'Re-enter Password','type'=>'password'])}}
								</div>
								@endguest
								<button class="btn btn-theme col-sm-offset-3 col-sm-6" id="proceed"  data-toggle="collapse" data-parent="#accordion" href="#collapse3">PROCEED</button>
							</div>
						</div>
						<br><br>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<span><i class="fa fa-credit-card" aria-hidden="true"></i></span>
						<h4 class="panel-title">
							<p>Secure Payment</p>
						</h4>
					</div>
					@php ($total = 0)
					@foreach($courses->all() as $course)
						@php($total += $course->price)
					@endforeach
					<div id="collapse3" class="panel-collapse collapse">
						<div class="container-fluid"> 
							<div class="row">
								<div class="col-xs-12">
									<h4>You will be charged <b>Rs. {{$total+($total*18/100)}} </b> through your Credit card.</h4>
			    					<p>Your purchase is safe and secure. Our check-out is PCI-DSS compliant as indicated by the secure lock in your address bar. Over 500,000 professionals like you have purchased courses from CretifyMe</p>
									{{Form::submit('PAY SECURELY',['class'=>'btn btn-theme'])}}
									<br><br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		{!!Form::close()!!}
	</div>
</div>
</div>
@include('inc.footer')
@endsection

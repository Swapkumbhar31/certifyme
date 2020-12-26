<div class="card">
	<h3>Inquiry</h3>
	{!! Form::open(['url'=>'course/inquiry'])!!}
	{{Form::text('fname','',['class'=>'form-control','placeholder'=>'First Name','required'=>'required'])}}
	{{Form::text('lname','',['class'=>'form-control','placeholder'=>'Last Name','required'=>'required'])}}
	{{Form::email('email','',['class'=>'form-control','placeholder'=>'Email Address','required'=>'required'])}}
	<div class="bfh-selectbox bfh-countries" data-name="country" data-country="IN" data-flags="true">
		<input type="hidden" value="">
		<a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
			<span class="bfh-selectbox-option input-medium" data-option=""></span>
			<b class="caret"></b>
		</a>
		<div class="bfh-selectbox-options">
			<input type="text" class="bfh-selectbox-filter">
			<div role="listbox">
				<ul role="option">
				</ul>
			</div>
		</div>
	</div>
	{{Form::number('phone','',['class'=>'form-control','placeholder'=>'Phone Number','required'=>'required'])}}
	{{Form::textarea('message','',['class'=>'form-control','placeholder'=>'Enter Message','required'=>'required'])}}
	{{Form::submit('Submit',['class'=>'btn btn-theme'])}}
	{!!Form::close()!!}
</div>

@extends('layouts.app')

@section('title')
    CertifyMe : Corporate Training
@endsection

@section('content')
	<div class="banner2 text-center">
		<div class="container">
        <h1>Train to win in the digital economy</h1>
        <input type="button" class="btn btn-warning text-uppercase" value="Request more information">
    	</div>
    </div>
    <div class="container text-center">
		<h1>The CertifyMe advantage</h1>
		<p style="padding: 10px 10%">CertifyMe provides corporate training in emerging technologies like IT, project management, Scrum and Agile development, digital marketing, and more. With our live and online training solutions, we help companies and teams get the skills they need to succeed in the digital economy.</p>
    	<div class="row">
    		<div class="col-md-4">
    			<span class="sprite cpt-credible-img"></span>
    			<h3>Credible</h3>
    			<h5>Course advisors your team will want to train from</h5>
    		</div>
    		<div class="col-md-4">
    			<span class="sprite cpt-Flexible-img"></span>
    			<h3>Flexible</h3>
    			<h5>Training tailored to your needs</h5>
    		</div>
    		<div class="col-md-4">
    			<span class="sprite cpt-Measure-img"></span>
    			<h3>Measurable</h3>
    			<h5>Outcome-centric solutions that deliver on your business goals</h5>
    		</div>
    	</div>
    </div>
    <div class="team">
		<div class="cover">
			<h1>Training tailored to your needs</h1>
        	<div class="row">
        		<div class="col-xs-3">
        			<span class="sprite cpt-team-cmn1"></span>
        		</div>
        		<div class="col-xs-9">
        			<p>Blended training with options for eLearning or online classroom</p>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-xs-3">
        			<span class="sprite cpt-team-cmn2"></span>
        		</div>
        		<div class="col-xs-9">
        			<p>Blended training with options for eLearning or online classroom</p>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-xs-3">
        			<span class="sprite cpt-team-cmn3"></span>
        		</div>
        		<div class="col-xs-9">
        			<p>Blended training with options for eLearning or online classroom</p>
        		</div>
        	</div>
        </div>
    </div>
    <div class="container text-center">
    	<h1>All Company Logo Here</h1>
    </div>
    <div class="footer">
    	<div class="container" style="padding: 40px 20%">
    	<h2 class="text-center">Send us your onsite requirments and we will provide a tailer made course for You!</h2>
    	{!! Form::open(['url'=>'/corporate/inquiry'])!!}
    		{{Form::text('fname','',['class'=>'form-control','placeholder'=>'First Name* ','required'=>'required'])}}
            {{Form::text('lname','',['class'=>'form-control','placeholder'=>'Last Name*','required'=>'required'])}}
            {{Form::email('email','',['class'=>'form-control','placeholder'=>'Email*','required'=>'required'])}}
            <input type="tel" id="demo" name="phone" class="form-control" required="required">
            <br>
            {{Form::text('company','',['class'=>'form-control','placeholder'=>'Company*','required'=>'required'])}}
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
			{{Form::number('number_employee', '', ['class'=>'form-control','placeholder'=>'Number of employees','required'=>'required'])}}
    		<label class="checkbox">I agree to be contacted over email and phone
              <input type="checkbox" name="agree" checked="checked" required="required">
              <span class="checkmark"></span>
            </label>
            {{Form::submit('Send',['class'=>'btn btn-theme col-md-6 col-md-offset-3'])}}

        {!!Form::close()!!}
    	</div>
	</div>
@endsection
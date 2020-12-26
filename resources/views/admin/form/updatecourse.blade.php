	@if($errors->count()!=0)
	<div class="alert alert-danger">
		<ul>
		@foreach($errors->all() as $error)
			<li>{{$error}}</li>
		@endforeach
	</ul>
	</div>
	@endif
<div class="row"> 
	{!! Form::open(['files' => true])!!}
		@php ($arr = array())
		@foreach($courses_cat->all() as $c)
		@php ($arr[$c->id] =  $c->name)
		@endforeach
	<div class="col-md-6"> 
		{{Form::label('course_cat','Course Category')}}
		{{Form::select('course_cat', $arr, $courses->type, ['class'=>'form-control','placeholder' => 'Select Course'])}}
	</div>
	<div class="col-md-6"> 
		{{Form::label('coursename','Course Name')}}
		{{Form::text('coursename',$courses->name,['class'=>'form-control','placeholder'=>'Enter Course Name'])}}
	</div>
	<div class="col-md-6"> </div>
	<div class="col-md-12">
		{{Form::label('description','Description')}}
		{{Form::textarea('description',$courses->description,['class'=>'form-control','placeholder'=>'Enter Course Name','size' => '30x5'])}}
	</div>
	<div class="col-md-6"> 
			{{Form::label('image_name','Select Image')}}
		<div class="input-group input-file" name="image">
    		{{Form::text('image_name','',['class'=>'form-control','placeholder'=>'Choose Image file'])}}	
            <span class="input-group-btn">
        		<button class="btn btn-default btn-choose" type="button">Choose</button>
    		</span>
		</div>
	</div>
	<div class="col-md-12">
		{{Form::label('rating','Rate a course')}}
		{{Form::select('rating', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'], $courses->rating , ['class'=>'form-control','placeholder' => 'Select Rating'])}}
	</div>
	<div class="col-md-6"> 
		{{Form::label('pricein','Price in India')}}
		{{Form::number('pricein',$prices==null?0:$prices->country_in,['class'=>'form-control','placeholder'=>'Price in India','required'=>'required'])}}
	</div>
	<div class="col-md-6"> 
		{{Form::label('priceus','Price in US')}}
		{{Form::number('priceus',$prices==null?0:$prices->country_us,['class'=>'form-control','placeholder'=>'Price in US','required'=>'required'])}}
	</div>
	<div class="col-md-6"> 
		{{Form::label('priceuk','Price in UK')}}
		{{Form::number('priceuk',$prices==null?0:$prices->country_uk,['class'=>'form-control','placeholder'=>'Price in UK','required'=>'required'])}}
	</div>
	<div class="col-md-12">
		{{Form::submit('Add Course',['class'=>'btn btn-theme'])}}
	</div>
	{!!Form::close()!!}
</div>
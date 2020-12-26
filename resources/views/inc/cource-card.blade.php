<div class="container">
	<br> 
	@php ($count = floor($courses->count()/5))
	@php ($remening = $courses->count()%5)
	@php ($c = 0)
	@for($x=0;$x<$count;$x++)
		<div class="row">
			@for($y= 0 ; $y < 5; $y++)
				@php ($t = $courses->get($c++))
				<div class="col-md-5ths">
					<div class="course-card">
						<img src="/images/courses/{{$t->image_url}}" class="img-responsive">
						<h2>{{$t->name}}</h2>
						<a class="btn btn-block btn-theme" href="/course/{{str_slug($t->name)}}/{{$t->id}}">Book Now</a>
					</div>
				</div>
			@endfor
		</div>
	@endfor
	@if($remening > 0)
		<div class="row">
			@for($x=0;$x<$remening;$x++)
				@php ($t = $courses->get($c++))
				<div class="col-md-5ths">
					<div class="course-card">
						<img src="/images/courses/{{$t->image_url}}" class="img-responsive">
						<h2>{{$t->name}}</h2>
						<a class="btn btn-block btn-theme" href="/course/{{str_slug($t->name)}}/{{$t->id}}">Book Now</a>
					</div>
				</div>
			@endfor
		</div>
	@endif
</div>
<div class = "course-banner">
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<h2>{{$course->name}}</h2>
				@for($x =0 ; $x < $course->rating; $x++)
					<i class="fa fa-star" aria-hidden="true"></i>
				@endfor
				<p>{{$course->description}}</p>
				<h3>{{$prices}}</h3>
			</div>
			<div class="col-md-3">
			<br>
			@if(file_exists('images/courses/'.$course->image_url))
			  {{ Html::image('images/courses/'.$course->image_url, str_slug($course->name), array('class' => 'img-responsive')) }}
			@else
			  {{ Html::image('images/No_image.png', str_slug($course->name), array('class' => 'img-responsive')) }}
			@endif
			<br>
			</div>
		</div>
	</div>
</div>
<br>

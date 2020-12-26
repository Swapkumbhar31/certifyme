<div class="card">
	<h3>Related Courses</h3>
	<div class="container-fluid">
	@foreach($courses as $c)
	@if($c->type == $course->type)
	<div class="row">
		@if(file_exists('images/courses/'.$c->image_url))
		  {{ Html::image('images/courses/'.$c->image_url, str_slug($c->name), array('class' => 'col-xs-4 img-responsive')) }}
		@else
		  {{ Html::image('images/No_image.png', str_slug($c->name), array('class' => 'col-xs-4 img-responsive')) }}
		@endif
		<a class="col-xs-8" href="/course/{{str_slug($c->name)}}/{{$c->id}}">{{$c->name}}</a>
	</div>
	<br>
	@endif
	@endforeach
</div>
</div>

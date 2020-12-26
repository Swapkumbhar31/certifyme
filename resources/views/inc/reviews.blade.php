<div class="card">
	<h3>Reviews</h3>
	@foreach($reviews->all() as $review)
	<div class="row">
		<div class="col-xs-2">
			<img src="http://via.placeholder.com/200x200" class="img-responsive">
		</div>
		<div class="col-xs-10">
			<h4>
				{{$review->fname}} {{$review->lname}}
				<span class="pull-right">
				@for($x = 0; $x < $review->rating ; $x++)
					<i class="fa fa-star" aria-hidden="true"></i>
				@endfor
				@for($x = 0; $x < 5-$review->rating ; $x++)
					<i class="fa fa-star-o" aria-hidden="true"></i>
				@endfor
				</span>
			</h4>
			<h5>{{$review->review}}</h5>
		</div>
	</div>
	<br>
	@endforeach
	<h3></h3>
	@if(isset($msg))
		<p class="alert alert-success">{{$msg}}</p>
	@endif
	@guest
		<a href="/login" class="btn btn-theme">Add Review</a> 
	@else
		{!! Form::open(['url'=>'course/review/add'])!!}
		{{Form::hidden('course_id',$course->id)}}
		{{Form::textarea('message','',['class'=>'form-control','placeholder'=>'Enter Review', 'rows'=>'3'])}}
		<input type="text" class="form-control bfh-number" value="5" name="rating" data-min="1" data-max="5">
		<br>
		{{Form::submit('Add Review',['class'=>'btn btn-theme'])}}
		{!!Form::close()!!}
	@endguest
</div>
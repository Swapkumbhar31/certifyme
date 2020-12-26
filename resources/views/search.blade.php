@extends('layouts.master')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-sm-9">
			@if($search->count() == 0)
			<h3 class="alert alert-danger">No result found</h3>
			<h4>Our Popular courses :</h4>
			@foreach($courses as $c)
			@if($c->rating >= 4)
			<div class="container-fluid card">
				<div class="row">
					<div class="col-sm-3">
						{{ Html::image('images/courses/'.$c->image_url, str_slug($c->name), array('class' => 'img-responsive')) }}
					</div>
					<div class="col-sm-9">
						<h5>{{$c->name}}</h5>
						@for($x =0 ; $x < $c->rating; $x++)
							<i class="fa fa-star" aria-hidden="true"></i>
						@endfor
						<p>{{substr($c->description,0,200)}}...<a href="/course/{{str_slug($c->name)}}/{{$c->id}}">Read more</a></p>
					</div>
				</div>
			</div>
			@endif
			@endforeach
			@else
			<h1>your search results</h1>
			@foreach($search as $c)
			<div class="container-fluid card">
				<div class="row">
					<div class="col-sm-3">
						{{ Html::image('images/courses/'.$c->image_url, str_slug($c->name), array('class' => 'img-responsive')) }}
					</div>
					<div class="col-sm-9">
						<h5>{{$c->name}}</h5>
						@for($x =0 ; $x < $c->rating; $x++)
							<i class="fa fa-star" aria-hidden="true"></i>
						@endfor
						<p>{{substr($c->description,0,200)}}...<a href="/course/{{str_slug($c->name)}}/{{$c->id}}">Read more</a></p>
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
		<div class="col-sm-3">
			<br>
			@include('inc.sidenav')
		</div>  
	</div>
</div>
@endsection
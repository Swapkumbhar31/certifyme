@extends('layouts.master')
@section('title')
	CertifyMe : {{$title}}
@endsection
@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-9">
				@foreach($courses as $c)
				@if($c->type == $id)
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
			</div>
			<div class="col-sm-3">
				<br>
		     	@include('inc.inquiry')
		  </div>  
		</div>
	</div>
@section('script')
<script>
	$('#nav').affix({
		offset: {
			top: $('header').height()
		}
	});	
</script>
@endsection
@endsection

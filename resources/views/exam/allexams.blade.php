<div class="row"> 
				<div class="col-xs-3">
					<ul class="nav nav-pills nav-stacked">
						@foreach($courses_cat as $cat)
						<li class="category {{$cat->id==1?'active':''}}"><a href="#tab-{{$cat->id}}" data-toggle="tab">{{$cat->name}}</a></li>
						@endforeach
					</ul>
				</div>
				<div class="col-xs-9">
					@if($examcourse->count() > 0)
					<div class="tab-content container-fluid">
						@foreach($courses_cat as $cat)
						<div class="tab-pane {{$cat->id==1?'active':''}}" id="tab-{{$cat->id}}">
							<div class="row"> 
								@foreach($examcourse->all() as $t)
								@if($t->type == $cat->id)
								<div class="col-md-4">
									<div class="course-card card">
										<img src="/images/courses/{{$t->image_url}}" class="img-responsive">
										<h2>{{$t->name}}</h2>
										<a class="btn btn-block btn-theme text-capitalize" href="/exam/start/{{$type}}/{{str_slug($t->name)}}/{{$t->id}}">Start {{$type}} Test</a>
									</div>
								</div>
								@endif
								@endforeach
							</div>
						</div>
						@endforeach
					</div>
					<div class="row">
						
					</div>
					@else
					<div class="jumbotron text-center">
						<h2>Currently No Online Test available.</h2>
					</div>
					@endif
				</div>
			</div>
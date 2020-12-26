<nav class="yamm  navbar navbar-default navbar-static example2">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		<a class="navbar-brand " href="/">
			<img src="{{ asset('images/logo.png') }}" class="img-responsive">
		</a>
		</div>
		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars" aria-hidden="true"></i> All Courses<span class="sr-only">(current)</span></a></a>
					<ul class="dropdown-menu">
				        <li>
				          <div class="yamm-content content1">
				          <div class="row">
				          	<div class="col-xs-4">
				          		<ul class="nav nav-pills nav-stacked">
				          			@foreach($courses_cat as $cat)
				          				<li class="category {{$cat->id==1?'active':''}}"><a href="#tab-{{$cat->id}}" data-toggle="tab">{{$cat->name}}</a></li>
				          			@endforeach
								 </ul>
				          	</div>
				          	<div class="col-xs-8">
				          		<div class="tab-content container-fluid">
				          			@foreach($courses_cat as $cat)
				          				<div class="tab-pane  {{$cat->id==1?'active':''}}" id="tab-{{$cat->id}}">
				          					<h2>Popular courses</h2>
				          					<div class="list-group">
				          					@foreach($courses as $c)
				          						@if($c->type == $cat->id)
				          						<a class="list-group-item" href="/course/{{str_slug($c->name)}}/{{$c->id}}">{{$c->name}}</a>
				          						@endif
				          					@endforeach
				          					</div>
				          				</div>
				          			@endforeach
								</div>
				          	</div>
				          </div>
				          </div>
				        </li>
				      </ul>
				</li>
				<li>
					<a href="/exam/online" >Online Exam<span class="sr-only">(current)</span></a></a>
				</li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="/corporate-training">Corporate Training</a></li>
				<li><a href="/exam/practice">Practice Test</a></li>
				@guest
				<li><a  href="{{ route('login') }}">Login</a></li>
				@else
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
						{{ Auth::user()->fname }} <span class="caret"></span>
					</a>

					<ul class="dropdown-menu">
						<li>
							<div class="yamm-content content2">
								<div class="container-fluid">
									<div class="col-xs-12" style="padding: 20px;">
										<img style="height: 200px;width: 200px;" class="img-circle  center-block img-thumbnail" src="{{ asset('images/logo.png') }}">
									</div>
									<div class="row">
										<div class="col-xs-6">
											<a class="btn ripple btn-default btn-block" href="/profile">My Profile</a>
										</div>
										<div class="col-xs-6">
											<a class="btn ripple btn-danger btn-block" href="{{ route('logout') }}"
											onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
											Logout
										</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
										</form>
										</div>
									</div>
								</div>
						</div>
					</li>
				</ul>
			</li>
			@endguest
			<li><a href="/cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>
		</ul>
	</div><!-- /.navbar-collapse -->
</div><!-- /.container-fluid -->
</nav>

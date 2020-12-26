<div class="course">
	<div id="course_advisor">
		<h2>Course Advisor</h2>
		@if(!empty($advisor))
		<div class="row advisor"> 
			<div class="col-md-2">
				<img src="/images/advisor/{{$advisor->image_url}}" class="img-circle img-responsive">
			</div>
			<div class="col-md-10">
				<p>{{$advisor->name}}
					<span>{{$advisor->post}}</span>
				</p>
				<p class="description">{{$advisor->description}}</p>
			</div>
		</div>
		@endif
	</div>
	<div id="course_feature">
		<h2>Key Features</h2>
		@if(count($featues) > 0)
		<div class="row">
			@foreach($featues as $a)
			<div class="col-sm-6">
				<div class="key-featue">
					<i class="fa fa-check-circle-o" aria-hidden="true"></i> {{$a->content}}
				</div>
			</div>
			@endforeach
		</div>
		@else
		<span class="alert alert-danger">
			No features added.
		</span>
		@endif
	</div>

	<div id="course_description">
		<h2>Course description</h2>
		@if(count($description) > 0)
		<div class="panel-group " id="accordion">
			@php ($x = 1)
			@foreach($description as $a)
			<div class="panel my-panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$x}}">{{$a->title}}</a>
					</h4>
				</div>
				<div id="collapse{{$x}}" class="panel-collapse collapse panel-body">

					<p>{{$a->content}}</p>
				</div>
			</div>
			@php ($x++)
			@endforeach
		</div>
		@else
		<span class="alert alert-danger">
			No course description added.
		</span>
		@endif
	</div>

	<div id="course_preview">
		<h2>
			Course preview
		</h2>
		@if(count($lesson) > 0)
		<div class="panel-group" id="lesson">
			@php ($x = 1)
			@foreach($lesson as $a)
			@if($a->type == 'lesson')
			<div class="panel my-panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#lesson" href="#lesson{{$x}}">Lesson {{$a->num}} : {{$a->name}}</a>
					</h4>
				</div>
				<div id="lesson{{$x}}" class="panel-collapse collapse panel-body">
					@foreach($lesson as $b)
					@if($b->type == 'sublesson' && $b->num == $a->num)
					<p>Lesson {{$b->num}}.{{$b->parent_lesson}} : {{$b->name}}</p>
					@endif
					@endforeach
				</div>
			</div>
			@endif
			@php ($x++)
			@endforeach
		</div>
		@else
		<span class="alert alert-danger">
			No Preview added.
		</span>
		@endif
	</div>

	<div id="course_exam_and_certification">

		<h2>Exam & certification</h2>
		@if(count($exam) > 0)
		<div class="panel-group" id="exam">
			@php ($x = 1)
			@foreach($exam as $a)
			<div class="panel my-panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#exam" href="#examdesc{{$x}}">{{$a->title}}</a>
					</h4>
				</div>
				<div id="examdesc{{$x}}" class="panel-collapse collapse panel-body">

					<p>{{$a->content}}</p>
				</div>
			</div>
			@php ($x++)
			@endforeach
		</div>
		@else
		<span class="alert alert-danger">
			No Exam & certification added.
		</span>
		@endif
	</div>
	<div id="course_faqs">
		<h2>FAQs</h2>
		@if(count($faqs) > 0)
		<div class="panel-group" id="faqs">
			@php ($x = 1)
			@foreach($faqs as $a)
			<div class="panel my-panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#faqs" href="#faqsdesc{{$x}}">{{$a->title}}</a>
					</h4>
				</div>
				<div id="faqsdesc{{$x}}" class="panel-collapse collapse panel-body">

					<p>{{$a->content}}</p>
				</div>
			</div>
			@php ($x++)
			@endforeach
		</div>
		@else
		<span class="alert alert-danger">
			No FAQs added.
		</span>
		@endif
	</div>
</div>
<h3 class="lead">FAQs <a href="#" data-toggle="modal" data-target="#faqsmodel"><i class="fa fa-pencil" aria-hidden="true"></i></a></h3>
@if(count($faqs) > 0)
<div class="panel-group" id="faqs">
	@php ($x = 1)
	@foreach($faqs as $a)
	<div class="panel my-panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#faqs" href="#faqsdesc{{$x}}">{{$a->title}}</a>
			<a class="btn btn-danger btn-xs" href="/admin/course/updatecourse/{{$a->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
				<a class="btn btn-danger btn-xs" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
<br>

<div id="faqsmodel" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add FAQs</h4>
			</div>
			<div class="modal-body">
				{!! Form::open()!!}
				{{Form::label('title','FAQs')}}
				{{Form::text('title','',['class'=>'form-control','placeholder'=>'Enter FAQs title','required'=>'required'])}}
				{{Form::label('content','FAQs Description')}}
				{{Form::textarea('content','',['class'=>'form-control','placeholder'=>'Enter FAQs description'])}}
				{{Form::hidden('type','4')}}
				{{Form::hidden('action','create')}}
				{{Form::hidden('course_id',$id)}}
				{{Form::submit('Add',['class'=>'btn btn-theme'])}}
				{!!Form::close()!!}
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
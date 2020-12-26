<h3 class="lead">Key Features <a href="#" data-toggle="modal" data-target="#featues"><i class="fa fa-pencil" aria-hidden="true"></i></a></h3>
  @if(count($featues) > 0)
  <ul>
    @foreach($featues as $a)
      <li>{{$a->content}} 
        <a class="btn btn-danger btn-xs" href="/admin/course/updatecourse/{{$a->id}}"><i class="fa fa-pencil" aria-hidden="true"></i></a>
        <a class="btn btn-danger btn-xs" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
      </li>
    @endforeach
  </ul>
  @else
    <span class="alert alert-danger">
      No features add.
    </span>
  @endif
<div id="featues" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Key Features</h4>
      </div>
      <div class="modal-body">
        {!! Form::open()!!}
            {{Form::label('content','Key Features')}}
            {{Form::text('content','',['class'=>'form-control','placeholder'=>'Enter Key Features'])}}
            {{Form::hidden('type','1')}}
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
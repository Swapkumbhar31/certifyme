<h3 class="lead">Benifits</h3>
  <ul>
    @foreach($benifits as $a)
      <li>{{$a->content}}</li>
    @endforeach
    <li><a href="#" data-toggle="modal" data-target="#benifits">Add</a></li>
  </ul>
<div id="benifits" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Benifits</h4>
      </div>
      <div class="modal-body">
        {!! Form::open()!!}
            {{Form::label('content','Program Benifits')}}
            {{Form::text('content','',['class'=>'form-control','placeholder'=>'Enter Program Benifits'])}}
            {{Form::hidden('type','3')}}
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
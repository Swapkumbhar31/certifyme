    <style type="text/css">
        .center-cropped {
          width: 100%;
          height: 150px;
          background-position: center center;
          background-repeat: no-repeat;
          background-size: cover;
          border-radius: 50%;
        }
    </style>
    <h3 class="lead">
        Course Advisor 
        <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#advisor">
            <i class="fa fa-pencil" aria-hidden="true"></i>
        </a>
    </h3>
    @if(!empty($advisor))
    <div class="row"> 
        <div class="col-md-2">
            <img class="img-responsive img-circle" 
                 src="/images/advisor/{{$advisor->image_url}}">
        </div>
        <div class="col-md-10">
            <h4>{{$advisor->name}}</h4>
            <h5>{{$advisor->post}}</h5>
            <p>{{$advisor->description}}</p>
        </div>
    </div>
    @endif
    <br>
    
    <div id="advisor" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add Advisor</h4>
        </div>
        <div class="modal-body">
            {!! Form::open()!!}
            @php ($arr = array())
            @foreach($advisors->all() as $c)
            @php ($arr[$c->id] =  $c->name)
            @endforeach()
            {{Form::label('content','Advisor')}}
            {{Form::select('content', $arr, isset($advisor->id)?$advisor->id:null, ['class'=>'form-control','placeholder' => 'Select Advisor'])}}
            {{Form::hidden('type','1')}}
            {{Form::hidden('action','update')}}
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
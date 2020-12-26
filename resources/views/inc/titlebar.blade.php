<div id="nav">
  <div class="navbar navbar-default navbar-static" id="scrollnavbar">
    <div class="container">
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li><a href="#course_advisor">Course advisor</a></li>
          <li><a href="#course_feature">Key features</a></li>
          <li><a href="#course_description">Course description</a></li>
          <li><a href="#course_preview">Course preview</a></li>
          <li><a href="#course_exam_and_certification">Exam & certification</a></li>
          <li><a href="#course_faqs">FAQs</a></li>
        </ul>
        {!! Form::open(['url' => 'course/addcart'])!!}
        {{Form::hidden('id',$course->id)}}
        {{Form::submit('Enroll',['class'=>'btn btn-danger navbar-btn'])}}
        {!!Form::close()!!}
      </div>		
    </div>
  </div><!-- /.navbar -->
</div>
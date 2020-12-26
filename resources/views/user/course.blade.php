<div class="container-fuild">
  <div class="row">
    @foreach($courses->all() as $t)
    <div class="col-md-4">
      <div class="course-card card">
        <img src="/images/courses/{{$t->image_url}}" class="img-responsive">
        <h2>{{$t->name}}</h2>
        <a class="btn btn-block btn-theme text-capitalize" href="/course/{{str_slug($t->name)}}/{{$t->course_id}}">Details</a>
      </div>
    </div>
    @endforeach
  </div>
</div>

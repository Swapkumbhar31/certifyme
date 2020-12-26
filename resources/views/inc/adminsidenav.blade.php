<div class="list-group">
	@php ($a = explode('/',Request::url()))
	@php ($a = isset($a[4])?$a[4]:'')
  <a href="/admin" class="list-group-item {{ $a==''? 'active' : '' }}">
    Home
    <span class="badge">14</span>
  </a>
  <a href="/admin/course" class="list-group-item {{ $a=='course' ? 'active' : '' }}">Course</a>
  <a href="/admin/advisor" class="list-group-item {{ $a=='advisor' ? 'active' : '' }}">Advisor</a>
  <a href="/admin/users" class="list-group-item {{ $a=='users' ? 'active' : '' }}">Users</a>
  <a href="/admin/onlineexam" class="list-group-item {{ $a=='onlineexam' ? 'active' : '' }}">Online Exam</a>
  <a href="/admin/questions" class="list-group-item {{ $a=='questions' ? 'active' : '' }}">Questions</a>
</div>
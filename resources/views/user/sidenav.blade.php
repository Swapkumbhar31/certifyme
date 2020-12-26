<div class="list-group">
	@php ($a = explode('/',Request::url()))
	@php ($a = isset($a[4])?$a[4]:'')
  <a href="/user/profile" class="list-group-item {{ $a=='profile'? 'active' : '' }}">Home</a>
  <a href="/user/course" class="list-group-item {{ $a=='course' ? 'active' : '' }}">Course</a>
  <a href="/user/results" class="list-group-item {{ $a=='results' ? 'active' : '' }}">Results</a>
  <a href="/user/setting" class="list-group-item {{ $a=='setting' ? 'active' : '' }}">Setting</a>
  <a href="/user/transactions" class="list-group-item {{ $a=='transactions' ? 'active' : '' }}">Transactions</a>
	@if(Auth::user()->admin == 'y')
  		<a href="/admin" class="list-group-item">Admin Panel</a>
  	@endif
</div>

@include('inc.inquiry')
@php ($a = explode('/',Request::url()))
@php ($a = isset($a[3])?$a[3]:'')
@if($a=='course')
	@include('inc.similar_course')
	@include('inc.enroll')
@endif
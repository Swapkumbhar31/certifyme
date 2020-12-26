<h1>New Request</h1>
<p>Name : {{$request->fname}} {{$request->lname}}<br>
	Email : {{$request->email}}<br>
	Phone : {{$request->phone}}<br>
	@if(isset($request->message))
	Message : {{$request->message}}<br>
	@endif
	@if(isset($request->country))
	Country : {{$request->country}}<br>
	@endif
	@if(isset($request->company))
	Company : {{$request->company}}<br>
	@endif
	@if(isset($request->number_employee))
	Number of employees : {{$request->number_employee}}<br>
	@endif
</p>

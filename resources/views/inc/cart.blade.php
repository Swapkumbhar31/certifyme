<div class="panel panel-default">
	<div class="panel-heading">
		<span><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
		<h4 class="panel-title">
			<p>Course Summary</p>
		</h4>
	</div>
	<div id="collapse1" class="panel-collapse collapse in">
		<div class="table-responsive">
			@php ($total = 0)
			@if($courses->count() > 0)
			<table class="table text-center">
				<tr>
					<th class="text-center">COURSE</th>
					<th class="text-center">TYPE</th>
					<th class="text-center">ACCESS DAYS</th>
					<th class="text-center">PRICE</th>
				</tr>
				@foreach($courses->all() as $course)
					@php($total += $course->price)
					<tr>
						<td>{{$course->name}}</td>
						<td>{{$course->type}}</td>
						<td>{{$course->duration}}</td>
						<td class="text-right">{{number_format($course->price,2)}}</td>
						<td>
							{!! Form::open(['method' => 'delete'])!!}
							{{Form::hidden('id',$course->id)}}
							<button type="submit" class="btn btn-danger" value="">
								<i class="fa fa-times" aria-hidden="true"></i>
							</button>
							{!!Form::close()!!}
						</td>
					</tr>
				@endforeach
					<tr class="text-right">
						<td class="text-right" colspan="3">Total :</td>
						<td>{{number_format($total,2)}}</td>
						<td></td>
					</tr>
					<tr class="text-right">
						<td class="text-right" colspan="3">GST (18%):</td>
						<td>+ {{number_format($total*18/100,2)}}</td>
						<td></td>
					</tr>
					<tr class="text-right">
						<td class="text-right" colspan="3">Net Total:</td>
						<td>{{$total+($total*18/100)}}</td>
						<td></td>
					</tr>
			</table>
			@else
				<p class="alert alert-success" style="margin: 30px;">You haven't added any course...</p>
			@endif
		</div>
		<div class="container-fluid" style="padding: 20px;">
			<div class="row">
				<div class="col-md-4 col-md-offset-8 text-right">
					@php ($a = explode('/',Request::url()))
					@php ($a = isset($a[3])?$a[3]:'')
					<div class="container-fluid">
						<div class="row">
						<div class="col-xs-6" style="padding: 2px">
							{{Form::text('coupon','',['class'=>'form-control','placeholder'=>'Coupon'])}}
						</div>
						<div class="col-xs-6" style="padding: 2px 15px 2px 2px;">
							{{Form::submit('Apply',['class'=>'btn btn-block btn-theme'])}}
						</div>
						</div>
					</div>
					@if($total > 0)
					@if($a == 'cart') 
						<a href="/cart/checkout" class="btn btn-success">Check Out</a>
					@else
					<button class="btn btn-success" id="proceed"  data-toggle="collapse" data-parent="#accordion" href="#collapse2">PROCEED</button>
					@endif
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
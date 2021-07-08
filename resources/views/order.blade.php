@extends('layouts.frontend.app')

@push('css')

@endpush

@section('content')
<div class="products-breadcrumb">
		<div class="container">
			<ul>
				<li><i class="fa fa-home" aria-hidden="true"></i><a href="index.html">Home</a><span>|</span></li>
				<li>Your Order</li>
			</ul>
		</div>
	</div>
		<div class="privacy about">
			<h3>Your <span>Order</span> </h3>
		</div>
		

<div class="container">
	
				<table class="table table-striped">
					<thead class="thead-dark">
						<tr>
							<th>SL.</th>
							<th>INVOICE</th>
							<th>DATE</th>
							<th>AMOUNT</th>
							<th>STATUS</th>
						</tr>
					</thead>
					<tbody>
						@php
						$i=1;
						@endphp
					@foreach($orders as $order)
						<tr>
							<td>{{$i++}}</td>
							<td style=""><a style="color:#000 !important; text-decoration:none;" href="{{ URL::to('/order/details/'.$order->invoice) }}">#{{$order->invoice}}</a></td>
							<td>{{$order->created_at}}</td>
							<td>৳{{$order->amount}}</td>
							<td>
								@if($order->status==0)
									<button class="btn btn-warning">Pending</button>
								@elseif($order->status==1)
									<button class="btn btn-info">Processing</button>
								@elseif($order->status==2)
									<button class="btn btn-danger">Cancel</button>
								@elseif($order->status==3)
									<button class="btn btn-primary">Picked</button>
								@elseif($order->status==4)
									<button class="btn btn-dark">Shipped</button>
								@elseif($order->status==5)
									<button class="btn btn-success">Delivered</button>
								@endif
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
			
			
	
</div>
@push('js')
@endpush
 
 @endsection
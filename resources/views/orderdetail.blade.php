@extends('layouts.frontend.app')

@push('css')

@endpush

@section('content')

<div class="mail">
			<h3> Order Details</h3>
			<div class="agileinfo_mail_grids">
				<div  class="col-md-6 agileinfo_mail_grid_left">
                    <h4 style="font-weight:bold;">INVOICE: #{{$info->invoice}} </h4><p style="font-size:15px; margin-top:3px">{{$info->created_at}}</p>
                    <h4 style="margin-top:15px; margin-bottom:7px; font-weight:bold;">Order Status</h4>
                    @if($info->status==0)
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Pending</label>
                    <input type="radio" disabled />
                    <label style="font-size:15px; font-weight:normal;">Processing</label>
                    <input type="radio" disabled />
                    <label style="font-size:15px; font-weight:normal;">Picked</label>
                    <input type="radio" disabled />
                    <label style="font-size:15px; font-weight:normal;">Shipped</label>
                    <input type="radio" disabled />
                    <label style="font-size:15px; font-weight:normal;">Delivered</label>
                    @elseif($info->status==1)
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Pending</label>
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Processing</label>
                    <input type="radio" disabled />
                    <label style="font-size:15px; font-weight:normal;">Picked</label>
                    <input type="radio" disabled />
                    <label style="font-size:15px; font-weight:normal;">Shipped</label>
                    <input type="radio" disabled />
                    <label style="font-size:15px; font-weight:normal;">Delivered</label>
                    @elseif($info->status==2)
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;"> Cancelled</label>
                    @elseif($info->status==3)
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Pending</label>
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Processing</label>
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Picked</label>
                    <input type="radio" disabled />
                    <label style="font-size:15px; font-weight:normal;">Shipped</label>
                    <input type="radio" disabled />
                    <label style="font-size:15px; font-weight:normal;">Delivered</label>
                    @elseif($info->status==4)
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Pending</label>
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Processing</label>
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Picked</label>
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Shipped</label>
                    <input type="radio" disabled />
                    <label style="font-size:15px; font-weight:normal;">Delivered</label>
                    @elseif($info->status==5)
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Pending</label>
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Processing</label>
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Picked</label>
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Shipped</label>
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Delivered</label>
                    @endif

                    <h4 style="margin-top:15px; margin-bottom:7px; font-weight:bold;">Address: </h4>
                    <p>
                        {{$info->address}}
                    </p>
				</div>
				<div class="col-md-6 agileinfo_mail_grid_right">
                
                    <table class="table table-bordered">
                        <thead>
                            <td>Product</td>
                            <td>Price & Qty</td>
                            <td>Total</td>
                        </thead>
                        @php
                            $sum=0;
                        @endphp
                        @foreach($orders as $order)
                        <tbody>
                            <td><img style="height:40px; width:40px;" src="/assets/backend/productImage/{{$order->proImage}}" /> {{$order->proName}}</td>
                            <td>{{$order->price}} x {{$order->qty}}</td>
                            <td>৳{{ $sub = $order->price*$order->qty}}</td>
                        </tbody>
                        @php 
                            $sum+=$sub;
                        @endphp
                        @endforeach
                    </table>
                    <table class="">
                        <thead>
                            <td><h4>Subtotal </h4></td>
                            <td><h4>: ৳{{$sum}}</h4></td>
                        </thead>
                    </table>
                   
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
</div>
		<div class="clearfix"></div>
	</div>
@push('js')

@endpush
 
 @endsection
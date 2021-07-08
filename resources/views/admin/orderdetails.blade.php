@extends('layouts.backend.app')

@push('css')

@endpush

@section('content')
<div class="container-fluid">
<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Order Details</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
</div>
<div class="container">
<div class="row">
    <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Order Information</h6>
                </div>
                <div class="card-body">
                  <h5>{{$order->name}}</h5>
                  <h6>{{$order->number}}</h6>
                  <h5 class="mt-3">INVOICE: #{{$order->invoice}}</h5><p style="font-size:13px;">{{$order->created_at}}</p>
                  <h5>Order Status</h5>
                @if($order->status==0)
                <form action="{{ URL::to('/update/status') }}" method="POST">
                @csrf
                    <input type="hidden" name="invoice" value="{{$order->invoice}}" />
                    <input type="radio"  checked />
                    <label style="font-size:15px; font-weight:normal;">Pending</label>
                    <input name="checked" value="1" type="radio" />
                    <label style="font-size:15px; font-weight:normal;">Processing</label>
                    <input type="radio" disabled  />
                    <label style="font-size:15px; font-weight:normal;">Picked</label>
                    <input type="radio" disabled  />
                    <label style="font-size:15px; font-weight:normal;">Shipped</label>
                    <input type="radio" disabled  />
                    <label style="font-size:15px; font-weight:normal;">Delivered</label></br>
                    <input type="submit" class="btn btn-dark btn-sm" value="Submit" />
                </form>
                @elseif($order->status==1)
                <form action="{{ URL::to('/update/status') }}" method="POST">
                @csrf
                    <input type="hidden" name="invoice" value="{{$order->invoice}}" />
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Pending</label>
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Processing</label>
                    <input name="checked" value="3" type="radio" required  />
                    <label style="font-size:15px; font-weight:normal;">Picked</label>
                    <input type="radio" disabled  />
                    <label style="font-size:15px; font-weight:normal;">Shipped</label>
                    <input type="radio" disabled  />
                    <label style="font-size:15px; font-weight:normal;">Delivered</label></br>
                    <input type="submit" class="btn btn-dark btn-sm" value="Submit" />
                </form>
                @elseif($order->status==3)
                <form action="{{ URL::to('/update/status') }}" method="POST">
                @csrf
                    <input type="hidden" name="invoice" value="{{$order->invoice}}" />
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Pending</label>
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Processing</label>
                    <input type="radio" checked  />
                    <label style="font-size:15px; font-weight:normal;">Picked</label>
                    <input name="checked" value="4" type="radio" required />
                    <label style="font-size:15px; font-weight:normal;">Shipped</label>
                    <input type="radio" disabled  />
                    <label style="font-size:15px; font-weight:normal;">Delivered</label></br>
                    <input type="submit" class="btn btn-dark btn-sm" value="Submit" />
                </form>
                @elseif($order->status==4)
                <form action="{{ URL::to('/update/status') }}" method="POST">
                @csrf
                    <input type="hidden" name="invoice" value="{{$order->invoice}}" />
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Pending</label>
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Processing</label>
                    <input type="radio" checked  />
                    <label style="font-size:15px; font-weight:normal;">Picked</label>
                    <input checked type="radio" checked  />
                    <label style="font-size:15px; font-weight:normal;">Shipped</label>
                    <input name="checked" value="5" type="radio" required  />
                    @php 
                        $x=0;
                    @endphp
                    @foreach($products as $product)
                    <input name="id" value="{{ $product->id }}" type="text" required  />
                    <input name="qty" value="{{ $product->qty }}" type="text" required  />
                    <input name="total" value="{{ count($products) }}" type="hidden" required  />
                    @php
                    $x++
                    @endphp
                    @endforeach
                    <label style="font-size:15px; font-weight:normal;">Delivered</label></br>
                    <input type="submit" class="btn btn-dark btn-sm" value="Submit" />
                </form>
                @elseif($order->status==5)
                <form action="{{ URL::to('/update/status') }}" method="POST">
                @csrf
                    <input type="hidden" name="invoice" value="{{$order->invoice}}" />
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Pending</label>
                    <input type="radio" checked />
                    <label style="font-size:15px; font-weight:normal;">Processing</label>
                    <input type="radio" checked  />
                    <label style="font-size:15px; font-weight:normal;">Picked</label>
                    <input checked type="radio" checked  />
                    <label style="font-size:15px; font-weight:normal;">Shipped</label>
                    <input type="radio" checked  />
                    <label style="font-size:15px; font-weight:normal;">Delivered</label></br>
                    <input type="submit" class="btn btn-dark btn-sm" value="Submit" />
                </form>
                @endif
                    <h5 class="mt-4 ">Address: </h5>
                    <p>{{$order->address}}</p>
                </div>
              </div>
            </div>

            <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Product Information</h6>
                </div>
                <div class="card-body">
                  <table class="table">
                        <thead>
                            <td>Product</td>
                            <td>Price & Qty</td>
                            <td>Total</td>
                        </thead>
                        @php 
                            $i=0;
                        @endphp
                        @foreach($products as $product)
                        <tbody>
                            <td>{{$product->proName}} </td>
                            <td>{{$product->price}} x {{$product->qty}} </td>
                            <td>৳{{$product->price*$product->qty}} </td>
                        </tbody>
                        @php 
                            $i+=$product->price*$product->qty;
                        @endphp
                        @endforeach
                  </table>
                  <h5 style="float:right;">Subtotal : ৳{{$i}}</h5>
                </div>
              </div>
            </div>
    </div>
</div>
</div>
@push('js')

@endpush
 
 @endsection
@extends('layouts.backend.app')

@push('css')
@endpush

@section('content')
<div class="container-fluid">
<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Orders</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
</div>
<div class="row">
	<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4 col-12 col-md-12">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>SL.</th>
            <th>Invoice No.</th>
            <th>Status</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>SL.</th>
            <th>Invoice No.</th>
            <th>Status</th>
            <th>Amount</th>
          </tr>
        </tfoot>
        <tbody>
        @php
        $i=1;
        @endphp
        @foreach($orders as $order)
          <tr>
                <td>{{$i++}}</td>
                <td>
                  <h6 style="color:#000;">#{{$order->invoice}}</h6>
                  <p style="font-size:10px; color:#000;">{{$order->created_at}}</p>
                </td>
                <td>
                <a href="{{ URL::to('/order.html/details/'.$order->invoice) }}">
                    @if($order->status==0)
                        <button class="btn btn-warning btn-sm">Pending</button>
                        @elseif($order->status==1)
                        <button class="btn btn-info btn-sm">Processing</button>
                        @elseif($order->status==2)
                        <button class="btn btn-danger btn-sm">Cancelled</button>
                        @elseif($order->status==3)
                        <button class="btn btn-primary btn-sm">Picked</button>
                        @elseif($order->status==4)
                        <button class="btn btn-dark btn-sm">Shipped</button>
                        @elseif($order->status==5)
                        <button class="btn btn-success btn-sm">Delivered</button>
                    @endif
                    </a>
                </td>
                <td style="color:#000;">৳{{$order->amount}}</td>
          </tr>
          </a>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>


	</div>
</div>


@push('js')
<!-- Bootstrap core JavaScript-->
  <script src="{{ asset('assets/backend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{ asset('assets/backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{ asset('assets/backend/js/sb-admin-2.min.js') }}"></script>

  <!-- Page level plugins -->
  <script src="{{ asset('assets/backend/vendor/chart.js/Chart.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('assets/backend/js/demo/chart-area-demo.js') }}"></script>
  <script src="{{ asset('assets/backend/js/demo/chart-pie-demo.js') }}"></script>

	<!-- Page level plugins -->
  <script src="{{ asset('assets/backend/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('assets/backend/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script src="{{ asset('assets/backend/js/demo/datatables-demo.js') }}"></script>
@endpush

@endsection
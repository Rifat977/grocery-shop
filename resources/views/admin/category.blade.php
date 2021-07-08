@extends('layouts.backend.app')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"  rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
</div>
<!--end page heading -->
<div class="row">
	<div class="container-fluid">

<div class="card shadow mb-4 col-md-6 col-lg-6 col-12">
      <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category Add</h6>
      </div>
     <div class="card-body">
     @if($errors->any())
        <div class="alert alert-danger">
            <ul>
            @foreach($errors->all() as $error)  
                <li>{{$error}}</li>
            @endforeach
            </ul>
        </div>
     @endif
      <form class="form-group" method="post" action="{{ url('/category/add') }}" enctype="multipart/form-data">
      @csrf
        <input type="text" name="category" placeholder="category name" class="form-control"/>
        <input type="file" name="image" class="mt-3 mb-3 form-group" />	
        <input type="submit" class="btn btn-primary btn-sm" value="ADD">
      </form>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4 col-12 col-md-12">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Categorys tables</h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>SL.</th>
            <th>Category</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>SL.</th>
            <th>Category</th>
            <th>Image</th>
            <th>Action</th>
          </tr>
        </tfoot>
        <tbody>
        @php
          $i = 1;
        @endphp
        @foreach($categoryShow as $data)
          <tr>
            <td>{{$i++}}</td>
            <td>{{$data->category}}</td>
            <td><img class="img-fluid mt-3 mb-2" style="height:100px; width:150px;" src="/assets/backend/categoryImage/{{$data->image}}"> </td>
            <td>
                <a href="{{ url('/categoryedit.html/'.$data->id) }}" class="btn btn-success mb-1">Edit</a>
                <a onclick='return false;' href="{{ url('/categorydelete.html/'.$data->id) }}" class="btn btn-danger mb-1">Delete</a>
            </td>
          </tr>
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
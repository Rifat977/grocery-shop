@extends('layouts.backend.app')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"  rel="stylesheet">
@endpush

@section('content')
<div class="container-fluid">
<!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Product</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>
</div>
<!--end page heading -->
<div class="row">
	<div class="container-fluid">

<div class="card shadow mb-4 col-md-8 col-lg-6 col-12">
      <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Product Upload</h6>
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
		<form class="form-group" action="{{ url('/product/add') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label>Product Name: </label>
			<input type="text" name="proName" placeholder="product name" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Product Category: </label>
			<select class="form-control" name="catId">
      <option>--Select category--</option>
      @foreach($data as $data)
				<option value="{{ $data->id }}">{{$data->category}}</option>
      @endforeach
			</select>
    </div>

    <div class="form-group mt-2">
      <label>Product Image: </label>
			<input type="file" name="proImage" class="form-group" />
    </div>

    <div class="form-group">
      <label>Old price: </label>  
			<input type="text" name="oldprice" placeholder="Old price" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Current price: </label>
			<input type="text" name="price" placeholder="Price" class="form-control"/>
   </div>

   <div class="form-group">
      <label>Stock: </label>
			<input type="text" name="stock" placeholder="Stock" class="form-control"/>
   </div>

   <div class="form-group">
      <label>Product Status: </label>
			<select class="form-control" name="status">
            <option value="1">Approved </option>
            <option value="0">Unapproved</option>
       </select>
    </div>
   

    <div class="form-group">
      <label>Product Details: </label>  
			<textarea class="form-control mt-3" name="details" rows="8" cols="180" placeholder="product details.."></textarea>
    </div>  
			<input type="submit" class="btn btn-primary btn-sm mt-3" value="ADD PRODUCTS">
	
		</form>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4 col-12 col-md-12">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Product List </h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>SL.</th>
            <th>Product</th>
            <th>Category</th>
            <th>Image</th>
            <th>Old Price</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Body</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>SL.</th>
            <th>Product</th>
            <th>Category</th>
            <th>Image</th>
            <th>Old Price</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Body</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
        </tfoot>
        @php
          $i = 1;
        @endphp
        @foreach($dataB as $dataB)
        <tbody>
          <tr>
            <td>{{$i++}}</td>
            <td>{{$dataB->proName}}</td>
            <td>{{$dataB->category}}</td>
            <td><img class="img-fluid mt-3 mb-2" style="height:80px; width:150px;" src="/assets/backend/productImage/{{$dataB->proImage}}"></td>
            <td>{{$dataB->oldprice}}</td>
            <td>{{$dataB->price}}</td>
            <td>{{$dataB->stock}}</td>
            <td>{{ Str::limit($dataB->details) }}</td>
            <td>
              @if($dataB->status == 1)
                <span class="text-success">Approved</span>
              @elseif($dataB->status == 0)
              <span class="text-danger">Unpproved</span>
              @endif
            </td>
            <td>
            	<a href="{{ url('/prodcutEdit.html/'.$dataB->id) }}" class="btn btn-success btn-sm" >Edit</a>
            	<a onclick="return confirm('Are you sure?')" href="{{ url('/prodcutDelete/'.$dataB->id) }}" class="btn btn-danger btn-sm mt-1" >Delete</a>
            </td>
          </tr>
        </tbody>
        @endforeach
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
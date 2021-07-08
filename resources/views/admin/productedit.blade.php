@extends('layouts.backend.app')

@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css"  rel="stylesheet">
@endpush

@section('content')

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
		<form class="form-group" action="{{ url('/prodcutUpdate.html') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group">
      <label>Product Name: </label>
			<input type="text" name="proName" value="{{ $data->proName }}" class="form-control"/>
    </div>

    <div class="form-group">
      <label>Product Category: </label>
			<select class="form-control" name="catId">
          @foreach($dataB as $dt)
            <option 
                  @if($data->catId == $dt->id)
                    selected="selected"
                  @endif
                    value="{{ $dt->id }}" >{{ $dt->category }}
            </option>
          @endforeach
       </select>
    </div>

      <input type="hidden" name="id" value="{{ $data->id }}" />
      <input type="hidden" name="oldimg" value="{{ $data->proImage }}" />

    <div class="form-group">
      <label>Product Image: </label>
			<input type="file" name="proImage" class=" form-group" />
    </div>

  <div class="form-group">
      <label>Old Price: </label>
			<input type="number" name="oldprice" value="{{ $data->oldprice }}" class="form-control"/>
  </div>
  <div class="form-group">
      <label>Current Price: </label>
			<input type="number" name="price" value="{{ $data->price }}" class="form-control"/>
  </div>

  <div class="form-group">
      <label>Stock: </label>
			<input type="number" name="stock" value="{{ $data->stock }}" class="form-control" />
   </div>

   <div class="form-group">
      <label>Product Status: </label>
			<select class="form-control" name="status">
        @if($data->status==1)
            <option value="1">Approved </option>
            <option value="0">Unapproved </option>
        @elseif($data->status==0)
            <option value="0">Unapproved</option>
            <option value="1">Approved </option>
        @endif
       </select>
    </div>

  <div class="form-group">
      <label>Details: </label> 
			<textarea class="form-control" name="details" rows="8" cols="180">{{ $data->details }}</textarea>
			<input type="submit" class="btn btn-primary btn-sm mt-3" value="UPDATE PRODUCTS">
	</div>

		</form>
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
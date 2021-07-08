@extends('layouts.backend.app')

@push('css')

@endpush

@section('content')
<div class="row">
	<div class="container-fluid">

<div class="card shadow mb-4 col-md-6 col-lg-6 col-12">
      <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Category Edit</h6>
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
      <form class="form-group" method="post" action="{{ url('/category/update') }}" enctype="multipart/form-data">
      @csrf
        <input type="text" name="category" value="{{ $editCat->category }}" class="form-control"/>
        <input type="hidden" name="id" value="{{ $editCat->id }}" />
        <input type="hidden" name="oldimg" value="{{ $editCat->image }}" />
        <img class="img-fluid mt-3 mb-2" style="height:40%; width:50%;" src="/assets/backend/categoryImage/{{$editCat->image}}" />
        <input type="file" name="image" class="mt-3 mb-3 form-group" />	
        <input type="submit" class="btn btn-primary btn-sm" value="Update">
      </form>
    </div>
</div>
@push('js')
@endpush

@endsection
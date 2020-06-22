@extends('Admin.master')
@section('content')
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
     <div class="card">
         <div class="card-body">
             <h5 class="card-title">Brand Edit</h5>
             <p class="card-text">
                <form method="POST" action="{{ route('admin.brand.update', $brand->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label class="control-label">Brand Name:</label>
                            <input type="text" class="form-control" name="brand_name" value="{{ $brand->brand_name }}">
                            @error('brand_name')
                             <strong class="text-danger">
                                 {{ $message }}
                             </strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">Brand Logo:</label>
                            <input type="file" class="form-control" name="brand_logo"">
                            @error('brand_logo')
                             <strong class="text-danger">
                                 {{ $message }}
                             </strong>
                            @enderror
                            <br><br>
                            <img width="100" src="{{ asset('Backend/assets/images/Brand/'. $brand->brand_logo) }}" alt="">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Brand</button>
                </form>
                </div>
             </p>
         </div>
     </div>
  </div>
  <div class="col-md-2"></div>
</div>
@endsection

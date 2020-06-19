@extends('Admin.master')
@section('content')
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
     <div class="card">
         <div class="card-body">
             <h5 class="card-title">Category Edit</h5>
             <p class="card-text">
                <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control" name="category" value="{{ $category->category_name}}">
                        @error('category')
                         <strong class="text-danger">
                             {{ $message }}
                         </strong>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                 </form>
             </p>
         </div>
     </div>
  </div>
  <div class="col-md-2"></div>
</div>
@endsection

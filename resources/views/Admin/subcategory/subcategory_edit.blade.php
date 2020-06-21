@extends('Admin.master')
@section('content')
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
     <div class="card">
         <div class="card-body">
             <h5 class="card-title">subCategory Edit</h5>
             <p class="card-text">
                <form method="POST" action="{{ route('admin.subcategory.update', $subcategory->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label class="control-label">Add Category:</label>
                        <select name="category" id="" class="form-control">
                            <option value="">** Select Category **</option>
                            @foreach ( $categories as $row)
                               <option value="{{ $row->id }}" {{ ($row->id == $subcategory->category_id)?'selected':'' }}>{{ $row->category_name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                         <strong class="text-danger">
                             {{ $message }}
                         </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="subcategory" value="{{ $subcategory->subcategory_name}}">
                        @error('subcategory')
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

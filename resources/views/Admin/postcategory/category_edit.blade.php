@extends('Admin.master')
@section('content')
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
     <div class="card">
         <div class="card-body">
             <h5 class="card-title">postcategory Edit</h5>
             <p class="card-text">
                <form method="POST" action="{{ route('admin.postcategory.update', $postcategory->id) }}">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Category Name English</label>
                            <input type="text" class="form-control" id="recipient-name1" name="category_name_en" value="{{ $postcategory->category_name_en }}">
                            @error('category_name_en')
                             <strong class="text-danger">
                                 {{ $message }}
                             </strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Category Name Bangla</label>
                            <input type="text" class="form-control" id="recipient-name1" name="category_name_bn" value="{{ $postcategory->category_name_bn }}">
                            @error('category_name_bn')
                             <strong class="text-danger">
                                 {{ $message }}
                             </strong>
                            @enderror
                        </div>    
                        <button type="submit" class="btn btn-primary">Update</button>       
                </div>
              </form>
             </p>
         </div>
     </div>
  </div>
  <div class="col-md-2"></div>
</div>
@endsection

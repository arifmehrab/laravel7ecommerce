@extends('Admin.master')
@section('content')
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
     <div class="card">
         <div class="card-body">
             <h5 class="card-title">coupon Edit</h5>
             <p class="card-text">
                <form method="POST" action="{{ route('admin.coupon.update', $coupon->id) }}">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label class="control-label">coupon Code:</label>
                            <input type="text" class="form-control" name="coupon" value="{{ $coupon->coupon }}">
                            @error('coupon')
                             <strong class="text-danger">
                                 {{ $message }}
                             </strong>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label">coupon Discount</label>
                            <input type="number" class="form-control" name="discount" value="{{ $coupon->discount }}">
                            @error('discount')
                             <strong class="text-danger">
                                 {{ $message }}
                             </strong>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update Coupon</button>
                </form>
                </div>
             </p>
         </div>
     </div>
  </div>
  <div class="col-md-2"></div>
</div>
@endsection

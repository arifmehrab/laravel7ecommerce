@extends('Admin.master')
@section('content')
<div class="row">
   <div class="col-12">
    <button style="float: right;" type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Add Brand</button>
   </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			 <div class="card-body">
                <h4 class="text-left" style="font-size: 25px; font-weight: bold;">Total Coupons:- {{ $coupons->count() }}
                </h4>
			 	<div class="table-responsive m-t-40">
			 		<table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        	<tr>
                               <td>SL.</td>
                               <td>Coupon Code</td>
                               <td>Coupon Percantage (%)</td>
                               <td>Status</td>
                               <td>Date</td>
                        	   <td>Action</td>
                        	</tr>
                        </thead>
                        <tbody>
                        @foreach ( $coupons as $key => $row )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $row->coupon }}</td>
                            <td>{{ $row->discount }}</td>
                            <td>
                                @if($row->status == 0)
                                <strong class="bg-danger p-2 text-light">Expired</strong>
                                @else
                                <strong class="bg-info p-2 text-light">Active</strong>
                                @endif
                            </td>
                            <td>{{ $row->created_at->diffForHumans() }}</td>
                            <td>
                                <a title="Edit" class="btn btn-success" href="{{ route('admin.coupon.edit', $row->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                  <button title="Delete" type="button" class="btn btn-danger">
                                      <i onclick="deleteItem({{ $row->id }})" class="fa fa-trash"></i>
                                  </button>
                                  <form id="delete_form_{{ $row->id }}" method="POST" action="{{ route('admin.coupon.destroy', $row->id) }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
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
<!-- category Add Model --->
<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel1">Add Coupon</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
             <form method="POST" action="{{ route('admin.coupon.store') }}">
                @csrf
                    <div class="form-group">
                        <label class="control-label">Coupon:</label>
                        <input type="text" class="form-control" name="coupon">
                        @error('coupon')
                         <strong class="text-danger">
                             {{ $message }}
                         </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="control-label">Coupon Discount</label>
                        <input type="number" class="form-control" name="discount">
                        @error('discount')
                         <strong class="text-danger">
                             {{ $message }}
                         </strong>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Coupon</button>
            </div>
          </form>
        </div>
    </div>
</div>
<!-- /.modal -->
@endsection

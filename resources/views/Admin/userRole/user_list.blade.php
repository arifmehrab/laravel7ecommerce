@extends('Admin.master')
@section('content')
<div class="row">
   <div class="col-12">
    <a href="{{ route('admin.user.add') }}" style="float: right;" type="button" class="btn btn-info">Add SubAdmin</a>
   </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
                <h4 class="text-left" style="font-size: 25px; font-weight: bold;">Total SubAdmins:- {{ $subAdmins->count() }}
                </h4>
			 	<div class="table-responsive m-t-40">
			 		<table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        	<tr>
                               <td>Name</td>
                               <td>Email</td>
                               <td>Phone</td>
                               <td>Access</td>
                        	   <td>Action</td>
                        	</tr>
                        </thead>
                        <tbody>
                        @foreach($subAdmins as $row)
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>
                                <span class="badge badge-info">{{ ($row->category == 2)?'Category':'' }}</span>
                                <span class="badge badge-success">{{ ($row->coupon == 2)?'Coupon':'' }}</span>
                                <span class="badge badge-warning">{{ ($row->product == 2)?'Product':'' }}</span>
                                <span class="badge badge-primary">{{ ($row->blog == 2)?'Blog':'' }}</span>
                                <span class="badge badge-info">{{ ($row->order == 2)?'Order': '' }}</span>
                                <span class="badge badge-primary">{{ ($row->report == 2)?'Report':'' }}</span>
                                <span class="badge badge-info">{{ ($row->setting == 2)?'Setting':'' }}</span>
                                <span class="badge badge-danger">{{ ($row->user_role == 2)?'User Role':'' }}</span>
                                <span class="badge badge-success">{{ ($row->return_order == 2)?'Return Order':'' }}</span>
                                <span class="badge badge-info">{{ ($row->contact_message == 2)?'Contact Message':'' }}</span>
                                <span class="badge badge-primary">{{ ($row->product_comment == 2)?'product Comments':'' }}</span>     
                            </td>
                            <td>
                                <a title="Edit" class="btn btn-success" href="{{ route('admin.user.update', $row->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                  <button title="Delete" type="button" class="btn btn-danger">
                                      <i onclick="deleteItem({{ $row->id }})" class="fa fa-trash"></i>
                                  </button>
                                  <form id="delete_form_{{ $row->id }}" method="POST" action="{{ route('admin.user.destory', $row->id) }}">
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
@endsection

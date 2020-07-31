@extends('Admin.master')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			 <div class="card-body">
                <h4 class="text-left" style="font-size: 25px; font-weight: bold;">Total
                     Orders:- {{ $orderLists->count() }}
                </h4>
			 	<div class="table-responsive m-t-40">
			 		<table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        	<tr>
                                <td>user</td>
                                <td>paymentType</td>
                                <td>Subtotal</td>
                                <td>shipping</td>
                                <td>Total</td>
                                <td>status</td>
                                <td>Action</td>
                             </tr>
                        </thead>
                        <tbody>
                        @foreach ( $orderLists as $row )
                        <tr>
                            <td>{{ $row->user->name }}</td>
                            <td>{{ $row->payment_type }}</td>
                            <td>${{ $row->subtotal }}</td>
                            <td>${{ $row->shipping }}</td>
                            <td>${{ $row->total }}</td>
                            <td>
                                @if($row->return_order == 1)
                                <span class="badge badge-danger">Pending</span>
                                @elseif($row->return_order == 2)
                                <span class="badge badge-success">Returned</span>
                                @else
                                @endif
                            </td>
                            <td>
                                <a title="View" class="btn btn-primary" href="{{ route('admin.order.view', $row->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
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
@endsection

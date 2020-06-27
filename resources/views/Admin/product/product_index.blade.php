@extends('Admin.master')
@section('content')
<div class="row">
   <div class="col-12">
    <a href="{{ route('admin.product.create') }}" style="float: right;" type="button" class="btn btn-info">Add Product</a>
   </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			 <div class="card-body">
                <h4 class="text-left" style="font-size: 25px; font-weight: bold;">Total Product:- {{ $products->count() }}
                </h4>
			 	<div class="table-responsive m-t-40">
			 		<table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        	<tr>
                        	   <td>SL.</td>
                               <td>Category</td>
                               <td>SubCategory</td>
                               <td>Brand</td>
                               <td>Product Name</td>
                               <td>Selling Price</td>
                               <td>Quantity</td>
                        	   <td>Action</td>
                        	</tr>
                        </thead>
                        <tbody>
                        @foreach ( $products as $key => $row )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $row->category_id }}</td>
                            <td>
                                <a title="Edit" class="btn btn-success" href="{{ route('admin.product.edit', $row->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="Edit" class="btn btn-success" href="{{ route('admin.product.show', $row->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                  <button title="Delete" type="button" class="btn btn-danger">
                                      <i onclick="deleteItem({{ $row->id }})" class="fa fa-trash"></i>
                                  </button>
                                  <form id="delete_form_{{ $row->id }}" method="POST" action="{{ route('admin.product.destroy', $row->id) }}">
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
@endsection

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
                <h4 class="text-left" style="font-size: 25px; font-weight: bold;">Total Product:- {{ $products->count() }}
                </h4>
			 	<div class="table-responsive m-t-40">
			 		<table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        	<tr>
                               <td>Name</td>
                               <td>Category</td>
                               <td>Brand</td>
                               <td>Price</td>
                               <td>Image</td>
                               <td>status</td>
                        	   <td>Action</td>
                        	</tr>
                        </thead>
                        <tbody>
                        @php
                        use Illuminate\Support\str;
                        @endphp
                        @foreach ( $products as $product )
                        <tr>
                            <td>{{ str::limit($product->product_name,10) }}</td>
                            <td>{{ $product->category->category_name }}</td>
                            <td>{{ $product->brand->brand_name }}</td>
                            <td>{{ $product->selling_price }}</td>
                            <td>
                                <img width="50" height="50" src="{{ asset('Backend/assets/images/product/'. $product->image_one) }}" alt="">
                            </td>
                            <td>
                                @if($product->status == 1)
                                <span class="bg-primary p-1 text-light">Active</span>
                                @else
                                <span class="bg-danger p-1 text-light">Inctive</span>
                                @endif
                            </td>
                            <td>
                                <a title="Edit" class="btn btn-success" href="{{ route('admin.product.edit', $product->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="View" class="btn btn-primary" href="{{ route('admin.product.show', $product->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                @if($product->status == 1)
                                <a title="Inactive" class="btn btn-danger" href="{{ route('admin.product.inactive', $product->id) }}">
                                    <i class="fa fa-thumbs-down"></i>
                                </a>
                                @else
                                <a title="Active" class="btn btn-info" href="{{ route('admin.product.active', $product->id) }}">
                                    <i class="fa fa-thumbs-up"></i>
                                </a>
                                @endif
                                  <button title="Delete" type="button" class="btn btn-danger">
                                      <i onclick="deleteItem({{ $product->id }})" class="fa fa-trash"></i>
                                  </button>
                                  <form id="delete_form_{{ $product->id }}" method="POST" action="{{ route('admin.product.destroy', $product->id) }}">
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

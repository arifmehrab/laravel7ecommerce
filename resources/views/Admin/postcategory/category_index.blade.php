@extends('Admin.master')
@section('content')
<div class="row">
   <div class="col-12">
    <button style="float: right;" type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">Add PostCategory</button>
   </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
			 <div class="card-body">
                <h4 class="text-left" style="font-size: 25px; font-weight: bold;">Total postCategories:- {{ $postcategories->count() }}
                </h4>
			 	<div class="table-responsive m-t-40">
			 		<table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        	<tr>
                        	   <td>SL.</td>
                               <td>category Name English</td>
                               <td>Category Name Bangla</td>
                        	   <td>Action</td>
                        	</tr>
                        </thead>
                        <tbody>
                        @foreach ( $postcategories as $key => $category )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $category->category_name_en }}</td>
                            <td>{{  $category->category_name_bn }}</td>
                            <td>
                                <a title="Edit" class="btn btn-success" href="{{ route('admin.postcategory.edit', $category->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                  <button title="Delete" type="button" class="btn btn-danger">
                                      <i onclick="deleteItem({{ $category->id }})" class="fa fa-trash"></i>
                                  </button>
                                  <form id="delete_form_{{ $category->id }}" method="POST" action="{{ route('admin.postcategory.destroy', $category->id) }}">
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
                <h4 class="modal-title" id="exampleModalLabel1">Add postCategory</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
             <form method="POST" action="{{ route('admin.postcategory.store') }}">
                @csrf
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Category Name English</label>
                        <input type="text" class="form-control" id="recipient-name1" name="category_name_en">
                        @error('category_name_en')
                         <strong class="text-danger">
                             {{ $message }}
                         </strong>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="control-label">Category Name Bangla</label>
                        <input type="text" class="form-control" id="recipient-name1" name="category_name_bn">
                        @error('category_name_bn')
                         <strong class="text-danger">
                             {{ $message }}
                         </strong>
                        @enderror
                    </div>           
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Category</button>
            </div>
          </form>
        </div>
    </div>
</div>
<!-- /.modal -->
@endsection

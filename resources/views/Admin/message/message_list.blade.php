@extends('Admin.master')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			 <div class="card-body">
                <h4 class="text-left" style="font-size: 25px; font-weight: bold;">Total Message:- {{ $messages->count() }}
                </h4>
			 	<div class="table-responsive m-t-40">
			 		<table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        	<tr>
                               <td>Name</td>
                               <td>Email</td>
                               <td>Phone</td>
                               <td>Message</td>
                        	   <td>Action</td>
                        	</tr>
                        </thead>
                        <tbody>
                        @foreach ( $messages as $key => $row )
                        <tr>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->message }}</td>
                            <td>
                                  <button title="Delete" type="button" class="btn btn-danger">
                                      <i onclick="deleteItem({{ $row->id }})" class="fa fa-trash"></i>
                                  </button>
                                  <form id="delete_form_{{ $row->id }}" method="POST" action="{{ route('admin.message.delete', $row->id) }}">
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

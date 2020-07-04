@extends('Admin.master')
@section('content')
<div class="row">
   <div class="col-12">
    <a href="{{ route('admin.post.create') }}" style="float: right;" type="button" class="btn btn-info">Add Post</a>
   </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card">
                <h4 class="text-left" style="font-size: 25px; font-weight: bold;">Total Product:- {{ $posts->count() }}
                </h4>
			 	<div class="table-responsive m-t-40">
			 		<table id="myTable" class="table table-bordered table-striped">
                        <thead>
                        	<tr>
                               <td>Post category</td>
                               <td>Post English Title</td>
                               <td>Post Bangla Title</td>
                               <td>Images</td>
                        	   <td>Action</td>
                        	</tr>
                        </thead>
                        <tbody>
                        @php
                        use Illuminate\Support\str;
                        @endphp
                        @foreach ( $posts as $post )
                        <tr>
                            <td>{{ $post->postcategory->category_name_en }}</td>
                            <td>{{ str::limit($post->post_title_en,10) }}</td>
                            <td>{{ str::limit($post->post_title_bn,10) }}</td>
                            <td>
                                <img width="50" height="50" src="{{ asset('Backend/assets/images/post/'.$post->post_image) }}" alt="">
                            </td>
                            <td>
                                <a title="Edit" class="btn btn-success" href="{{ route('admin.post.edit', $post->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="View" class="btn btn-primary" href="{{ route('admin.post.show', $post->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                  <button title="Delete" type="button" class="btn btn-danger">
                                      <i onclick="deleteItem({{ $post->id }})" class="fa fa-trash"></i>
                                  </button>
                                  <form id="delete_form_{{ $post->id }}" method="POST" action="{{ route('admin.post.destroy', $post->id) }}">
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

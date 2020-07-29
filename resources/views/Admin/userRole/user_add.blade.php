@extends('Admin.master')
@section('content')
<div class="row">
   <div class="col-12">
    <a style="float: right;" class="btn btn-info" href="{{ route('admin.user.list') }}">All User</a>
   </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card p-3">
           <!--- Product From start --->
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <!-- From section one -->
                <div class="form-row">
                <!--- colum 1 --->
                  <div class="col-md-6">
                      <div class="form-group">
                         <label for="">user Name <strong style="color: red;">*</strong></label>
                         <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                      </div>
                      <!--- Error Message -->
                      @error('name')
                      <strong style="color: red;">{{ $message }}</strong>
                      @enderror
                  </div>
                  <!--- colum 2 --->
                  <div class="col-md-6">
                    <div class="form-group">
                       <label for="">Email<strong style="color: red;">*</strong></label>
                       <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                    </div>
                  </div>
                  <!--- Error Message -->
                  @error('email')
                  <strong style="color: red;">{{ $message }}</strong>
                  @enderror
              </div><!-- From row end -->

               <!-- From section two -->
               <div class="form-row">
                <!--- colum 1 --->
                  <div class="col-md-6">
                      <div class="form-group">
                         <label for="">Phone<strong style="color: red;">*</strong></label>
                         <input type="number" class="form-control" name="phone" value="{{ old('Phone') }}">
                      </div>
                      <!--- Error Message -->
                      @error('Phone')
                      <strong style="color: red;">{{ $message }}</strong>
                      @enderror
                  </div>
                  <!--- colum 2 --->
                  <div class="col-md-6">
                    <div class="form-group">
                       <label for="">Password<strong style="color: red;">*</strong></label>
                       <input type="password" class="form-control" name="password" value="{{ old('password') }}">
                    </div>
                  </div>
                  <!--- Error Message -->
                  @error('password')
                  <strong style="color: red;">{{ $message }}</strong>
                  @enderror
              </div><!-- From row end -->

              <!-- From section Seven -->
              <div class="form-row">
                <!--- colum 15 --->
                  <div class="col-md-4">
                      <div class="form-group">
                        <input name="category" value="2" type="checkbox" id="category" class="filled-in chk-col-purple">
                        <label for="category">Category</label>
                      </div>
                  </div>
                  <!--- colum 16 --->
                  <div class="col-md-4">
                    <div class="form-group">
                        <input name="coupon" value="2" type="checkbox" id="coupon" class="filled-in chk-col-purple" >
                        <label for="coupon">Coupon</label>
                    </div>
                  </div>
                   <!--- colum 17 --->
                   <div class="col-md-4">
                    <div class="form-group">
                        <input name="product" value="2" type="checkbox" id="product" class="filled-in chk-col-purple">
                        <label for="product">Product</label>
                    </div>
                  </div>
              </div><!-- From row end -->

            <!-- From section Eight -->
              <div class="form-row">
                <!--- colum 18 --->
                  <div class="col-md-4">
                      <div class="form-group">
                        <input name="blog" value="2" type="checkbox" id="blog" class="filled-in chk-col-purple">
                        <label for="blog">Blog</label>
                      </div>
                  </div>
                  <!--- colum 19 --->
                  <div class="col-md-4">
                    <div class="form-group">
                        <input name="order" value="2" type="checkbox" id="order" class="filled-in chk-col-purple" >
                        <label for="order">Order</label>
                    </div>
                  </div>
                   <!--- colum 20 --->
                   <div class="col-md-4">
                    <div class="form-group">
                        <input name="report" value="2" type="checkbox" id="report" class="filled-in chk-col-purple">
                        <label for="report">Report</label>
                    </div>
                  </div>
              </div><!-- From row end -->
              <hr>
               <!-- From section Eight -->
               <div class="form-row">
                <!--- colum 18 --->
                  <div class="col-md-4">
                      <div class="form-group">
                        <input name="setting" value="2" type="checkbox" id="setting" class="filled-in chk-col-purple">
                        <label for="setting">setting</label>
                      </div>
                  </div>
                  <!--- colum 19 --->
                  <div class="col-md-4">
                    <div class="form-group">
                        <input name="user_role" value="2" type="checkbox" id="user_role" class="filled-in chk-col-purple" >
                        <label for="user_role">User Role</label>
                    </div>
                  </div>
                   <!--- colum 20 --->
                   <div class="col-md-4">
                    <div class="form-group">
                        <input name="return_order" value="2" type="checkbox" id="return_order" class="filled-in chk-col-purple">
                        <label for="return_order">Return Order</label>
                    </div>
                  </div>
              </div><!-- From row end -->
              <hr>
               <!-- From section Eight -->
               <div class="form-row">
                <!--- colum 18 --->
                  <div class="col-md-4">
                      <div class="form-group">
                        <input name="contact_message" value="2" type="checkbox" id="contact_message" class="filled-in chk-col-purple">
                        <label for="contact_message">Contact Message</label>
                      </div>
                  </div>
                  <!--- colum 19 --->
                  <div class="col-md-4">
                    <div class="form-group">
                        <input name="product_comment" value="2" type="checkbox" id="product_comment" class="filled-in chk-col-purple" >
                        <label for="product_comment">Product Comments</label>
                    </div>
                  </div>
                
              </div><!-- From row end -->
              <hr>
              <!-- From Submit section -->
              <div class="form-row">
                  <div class="col-12">
                     <button type="submit" class="btn btn-primary">Add user</button>
                  </div>
              </div>

            </form>
           <!--- Product From start --->
        </div>
	</div>
</div>
@endsection

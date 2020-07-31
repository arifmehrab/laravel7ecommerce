@extends('Admin.master')
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card p-3">
           <!--- Product From start --->
            <form action="{{ route('admin.site.setting.update', $site_info->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <!-- From section one -->
                <div class="form-row">
                <!--- colum 1 --->
                  <div class="col-md-6">
                      <div class="form-group">
                         <label for="">Ecommerce Vat<strong style="color: red;">*</strong></label>
                         <input type="text" class="form-control" name="vat" value="{{ $site_info->vat }}">
                      </div>
                      <!--- Error Message -->
                      @error('vat')
                      <strong style="color: red;">{{ $message }}</strong>
                      @enderror
                  </div>
                  <!--- colum 2 --->
                  <div class="col-md-6">
                    <div class="form-group">
                       <label for="">Shipping Charge<strong style="color: red;">*</strong></label>
                       <input type="text" class="form-control" name="shipping_charge" value="{{ $site_info->shipping_charge }}">
                    </div>
                  </div>
                  <!--- Error Message -->
                  @error('shipping_charge')
                  <strong style="color: red;">{{ $message }}</strong>
                  @enderror
              </div><!-- From row end -->
              
              <!-- From section Four -->
              <div class="form-row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Logo<strong style="color: red;">*</strong></label>
                        <input type="file" name="logo" class="form-control">
                    </div>
                    <br>
                    <img width="100" src="{{ asset('Backend/assets/images/settings/logo/'.$site_info->logo) }}" alt="">
                    <br>
                  </div>
                   <!--- Error Message -->
                   @error('logo')
                   <strong style="color: red;">{{ $message }}</strong>
                   @enderror
                   <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Shop Name<strong style="color: red;">*</strong></label>
                        <input type="text" name="shop_name" class="form-control" value="{{ $site_info->shop_name }}">
                    </div>
                  </div>
              </div><!-- From row end -->

            <div class="form-row">
                <!--- colum 1 --->
                  <div class="col-md-6">
                      <div class="form-group">
                         <label for="">Shop Offical Email<strong style="color: red;">*</strong></label>
                         <input type="email" class="form-control" name="email" value="{{ $site_info->email }}">
                      </div>
                  </div>
                  <!--- colum 2 --->
                  <div class="col-md-6">
                    <div class="form-group">
                       <label for="">Shop Offical Phone<strong style="color: red;">*</strong></label>
                       <input type="number" class="form-control" name="phone" value="{{ $site_info->phone }}">
                    </div>
                  </div>
              </div><!-- From row end -->
               <!-- From section Four -->
               <div class="form-row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Address<strong style="color: red;">*</strong></label>
                        <textarea name="address" rows="3" class="form-control">
                        {{ $site_info->address }}
                        </textarea>
                    </div>
                 </div>
            </div><!-- From row end -->

            <div class="form-row">
                <!--- colum 1 --->
                  <div class="col-md-6">
                      <div class="form-group">
                         <label for="">Facebook Url<strong style="color: red;">*</strong></label>
                         <input type="text" class="form-control" name="facebook_url" value="{{ $site_info->facebook_url }}">
                      </div>
                  </div>
                  <!--- colum 2 --->
                  <div class="col-md-6">
                    <div class="form-group">
                       <label for="">Twitter Url<strong style="color: red;">*</strong></label>
                       <input type="text" class="form-control" name="twitter_url" value="{{ $site_info->twitter_url }}">
                    </div>
                  </div>
              </div><!-- From row end -->

              <div class="form-row">
                <!--- colum 1 --->
                  <div class="col-md-6">
                      <div class="form-group">
                         <label for="">Youtube Url<strong style="color: red;">*</strong></label>
                         <input type="text" class="form-control" name="youtube_url" value="{{ $site_info->youtube_url }}">
                      </div>
                  </div>
                  <!--- colum 2 --->
                  <div class="col-md-6">
                    <div class="form-group">
                       <label for="">Vimeo Url<strong style="color: red;">*</strong></label>
                       <input type="text" class="form-control" name="vimeo_url" value="{{ $site_info->vimeo_url }}">
                    </div>
                  </div>
              </div><!-- From row end -->

               <!-- From section Four -->
               <div class="form-row">
                <div class="col-12">
                    <div class="form-group">
                        <label for="">Copy Wright Text<strong style="color: red;">*</strong></label>
                        <textarea name="copyright" rows="3" class="form-control">
                        {{ $site_info->copyright }}
                        </textarea>
                    </div>
                 </div>
            </div><!-- From row end -->
              <!-- From Submit section -->
              <div class="form-row">
                  <div class="col-12">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              </div>
            </form>
           <!--- Product From start --->
        </div>
	</div>
</div>
@endsection

@extends('Admin.master')
@section('content')
<div class="row">
   <div class="col-12">
    <a style="float: right;" class="btn btn-info" href="{{ route('admin.pending.order') }}">All Orders</a>
   </div>
</div>
<div class="row">
	<div class="col-12">
		<div class="card p-3">
            <h2 class="text-center">Order Details</h2>
                <!-- From section one -->
                <hr>
                <div class="row">
                <!--- colum 1 --->
                  <div class="col-md-6">
                      <strong>Order UserName:- <span>{{ $order->user->name }}</span></strong>
                  </div>
                  <!--- colum 2 --->
                  <div class="col-md-6">
                    <strong>Payment Type:- <span>{{ $order->payment_type }}</span></strong>
                  </div>
              </div><!-- From row end -->
                <hr>
              <!-- From section Two -->
              <div class="row">
                <!--- colum 4 --->
                  <div class="col-md-6">
                    <strong>Payment Id:- <span>{{ $order->payment_id }}</span></strong>
                  </div>
                  <!--- colum 5 --->
                  <div class="col-md-6">
                    <strong>Payment Amount:- {{ $order->payment_amount }}</strong>
                  </div>
              </div><!-- From row end -->
               <hr>
              <!-- From section Four -->
              <div class="row">
                  <div class="col-md-6">
                    <strong>Blance Transection:- {{ $order->blnc_transection }}</strong>
                  </div>
                  <div class="col-md-6">
                    <strong>Subtotal:- {{ $order->subtotal }}</strong>
                  </div>
              </div><!-- From row end -->
              <hr>
              <!-- From section Four -->
              <div class="row">
                <div class="col-md-6">
                  <strong>Shipping:- {{ $order->shipping }}</strong>
                </div>
                <div class="col-md-6">
                    <strong>Total:- {{ $order->total }}</strong>
                </div>
            </div><!-- From row end -->
             <hr>
             <!-- From section Four -->
             <div class="row">
                <div class="col-md-6">
                  <strong>Date:- {{ $order->date }}</strong>
                </div>
                <div class="col-md-6">
                 <strong>Year:- {{ $order->year }}</strong>
                </div>
            </div><!-- From row end -->
            <br>
            <div class="row">
               <div class="col-md-12">
                  @if($order->status == 0)
                  <span>Status</span>
                  <strong class="badge badge-danger btn-block">Pending</strong>
                  @elseif($order->status == 1)
                  <strong class="badge badge-primary btn-block">Accept Payment</strong>
                  @elseif($order->status == 2)
                  <strong class="badge badge-info btn-block">process</strong>
                  @elseif($order->status == 3)
                  <strong class="badge badge-success btn-block">Delevered</strong>
                  @else
                  <strong class="badge badge-danger btn-block">Cancle</strong>
                  @endif
               </div>
            </div>
           <!--- Product From start --->
        </div>
	</div>
</div>
<!---- Shipping Information --->
<div class="row">
	<div class="col-12">
		<div class="card p-3">
            <h2 class="text-center">Shipping Details</h2>
                <!-- From section one -->
                <hr>
                <div class="row">
                <!--- colum 1 --->
                  <div class="col-md-6">
                      <strong>Shipping UserName:- <span>{{ $shipping->ship_name }}</span></strong>
                  </div>
                  <!--- colum 2 --->
                  <div class="col-md-6">
                    <strong>Shipping Emails:- <span>{{ $shipping->ship_email }}</span></strong>
                  </div>
              </div><!-- From row end -->
                <hr>
              <!-- From section Two -->
              <div class="row">
                <!--- colum 4 --->
                  <div class="col-md-6">
                    <strong>Shipping Phone:- <span>{{ $shipping->ship_phone }}</span></strong>
                  </div>
                  <!--- colum 5 --->
                  <div class="col-md-6">
                    <strong>Shipping Address:- <span>{{ $shipping->ship_address }}</span></strong>
                  </div>
              </div><!-- From row end -->
               <hr>
              <!-- From section Four -->
              <div class="row">
                  <div class="col-md-6">
                    <strong>Shipping City:- <span>{{ $shipping->ship_city }}</span></strong>
                  </div>
                  <div class="col-md-6">
                    <strong>Shipping Post code:- <span>{{ $shipping->ship_post_code }}</span></strong>
                  </div>
              </div><!-- From row end -->    
        </div>
	</div>
</div>
<!----- End shipping Informations ---->

<!---- Order Details Information --->
<div class="row">
	<div class="col-12">
		<div class="card p-3">
            <h2 class="text-center">Order product Info</h2>
                <!-- From section one -->
                <div class="table-responsive m-t-5">
                    <table class="table table-bordered table-striped">
                       <thead>
                           <tr>
                               <td>Product Category</td>
                               <td>product Code</td>
                               <td>Product Name</td>
                               <td>Product color</td>
                               <td>Product Size</td>
                               <td>Product Quantity</td>
                               <td>Single Price</td>
                               <td>Total Price</td>
                            </tr>
                       </thead>
                       <tbody>
                       @foreach ( $order_details as $row )
                       <tr>
                           <td>{{ $row->product->category->category_name }}</td>
                           <td>{{ $row->product->product_code }}</td>
                           <td>{{ $row->product_name }}</td>
                           <td>{{ $row->color }}</td>
                           <td>{{ $row->size }}</td>
                           <td>{{ $row->qty }}</td>
                           <td>${{ $row->single_price }}</td>
                           <td>${{ $row->total_price }}</td>
                        </tr>
                       @endforeach
                       </tbody>
                   </table>
               </div>    
        </div>
	</div>
</div>
<!----- End order Details  ---->
<div class="row">
    <div class="col-12">
      @if($order->status == 0)
     <a class="btn btn-primary btn-block" href="{{ route('admin.order.accept', $order->id) }}">Accept payment</a>
    <a class="btn btn-danger btn-block" href="{{ route('admin.order.cancle', $order->id) }}">Cancle</a>
    @elseif($order->status == 1)
    <a class="btn btn-primary btn-block" href="{{ route('admin.order.prograss.status', $order->id) }}">Progress Order</a>
    @elseif($order->status == 2)
    <a class="btn btn-info btn-block" href="{{ route('admin.order.delivered.status', $order->id) }}">Delievery Order</a>
    @elseif($order->status == 3)
    <a class="btn btn-success btn-block disabled text-light">This Order Already Delievered</a>
    @else
    <a class="btn btn-danger btn-block disabled text-light">This Order is already canacled</a>
    @endif
   </div>
 </div>
@endsection


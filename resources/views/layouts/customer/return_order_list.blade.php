@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <table class="text-center table">
                       <tbody>
                           <tr>
                               <th>Payment Type</th>
                               <th>Order Status</th>
                               <th>Return Request</th>
                               <th>Amount</th>
                               <th>Date</th>
                               <td>Action</td>
                           </tr>
                       </tbody>
                       <tbody>
                           @foreach($orderList as $row)
                           <tr>
                               <td>{{ $row->payment_type }}</td>
                               <td>
                                @if($row->status == 0)
                                <span class="badge badge-danger">Pending</span>
                                @elseif($row->status == 1)
                                <span class="badge badge-success">Accept Payment</span>
                                @elseif($row->status == 2)
                                <span class="badge badge-info">prograss order</span>
                                @elseif($row->status == 3)
                                <span class="badge badge-primary">Delivered order</span>
                                @elseif($row->status == 4)
                                <span class="badge badge-danger">Cancle Order</span>
                                @else
                                @endif
                               </td>
                               <td>
                                   @if($row->return_order == 1)
                                   <span class="badge badge-danger">Return Pending</span>
                                   @elseif($row->return_order == 2)
                                   <span class="badge badge-success">Return Success</span>
                                   @else
                                   <span class="badge badge-info">Do not Applied</span>
                                   @endif
                               </td>
                               <td>${{ $row->total }}</td>
                               <td>{{ $row->date }}</td>
                               <td>
                                   @if($row->status == 3)
                                   @if($row->return_order == 0)
                                   <button class="btn btn-primary" onclick="returnRequest({{ $row->id }})">Return</button>
                                   @else
                                   <span class="badge badge-info">Already Applied</span>
                                   @endif
                                   <form action="{{ route('return.order.request', $row->id) }}" id="return_{{ $row->id }}">
                                       @csrf
                                       @method('put')
                                   </form>
                                   @elseif($row->status == 0)
                                   <a href="">Cancle</a>
                                   @else
                                   @endif
                               </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
        <!-- col md 4 --->
        <div class="col-md-4">
            <div class="card text-center">
                <img src="{{ asset('Frontend/images/profile/'.Auth::user()->profile) }}" alt="John" style="width: 100%; height:50%;">
                <h2>{{ Auth::user()->name }}</h2>
                <p class="title">{{ Auth::user()->phone_number }}</p>
                <p>{{ Auth::user()->email }}</p>
                <a class="btn btn-primary btn-block" href="{{ route('customer.profile.edit') }}">Update Profile</i></a>
                <a class="btn btn-info btn-block" href="{{ route('customer.password.change') }}">Password Update</i></a>
                <a class="btn btn-success btn-block" href="{{ route('customer.wishlist.view') }}">Wishlist</i></a>
                <a class="btn btn-danger btn-block" href="{{ route('customer.loguot') }}">Logout</a> 
              </div>
        </div>
    </div><!-- end row -->
</div><!-- end container -->
@endsection
@push('js')
    <!--- Sweet-Alert --->
<script type="text/javascript">
    function returnRequest(id){
        const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'mr-2 btn btn-danger'
                },
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You Want to Return This order!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Return it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                     event.preventDefault();
                     document.getElementById('return_'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Return Cancled :)',
                        'error'
                    )
                }
            })
    }

</script>
<!--- Sweet-Alert --->
@endpush

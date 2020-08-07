<table>
	@php $i = 1; @endphp
	@forelse($products as $row)
        <tr class="mt-3 d-block">
        	<td class="px-4" style="color: black; font-size: 20px;">{{$i++}}.</td>
        	<td class="w-10 search_img" style="width: 10%;"><img style="width: 100%; object-fit: cover;" src="{{ asset('Backend/assets/images/product/'.$row->image_one) }}"></td>
            <td class=" px-4"><a style="border-bottom: 1px solid black; font-size: 20px;  " href="{{ url('product/details/'.$row->id.'/'.$row->product_name) }}">{{$row->product_name}}</a></td>
        </tr>
       @empty
    	<strong style="color: #f00" class="ml-4">No Product Found!</strong>
	@endforelse
 </table> 
@extends('admin.master_dashboard')
@section('content')
</hr>
<table class= "table table-bordered table-hober" style="width:90%" align="center">
	
	<thead class="thead-dark">

		<tr scope ="row" align="center">
			<th>SL No. </th>
			<th>Customer Name</th>
			<th>Order Total</th>
			<th>Order Date</th>
			<th>Order Status</th>
			<th>Payment Type</th>
			<th>Payment Status</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		@php($i=1)
		@foreach($orders as $order)
		<tr>
			<td scope="row"  align="center">{{$i++}}</td>
			<td align="center">{{$order->firstname.' '. $order->lastname}}</td>
			<td align="center">TK. {{$order->order_total}}</td>
			<td align="center">{{$order->created_at}}</td>
			<td align="center">{{$order->order_status}}</td>
			<td align="center">{{$order->payment_type}}</td>
			<td align="center">{{$order->payment_status}}</td>
			
			<td>
				<a href="{{url('order/update/'.$order->id)}}" class="btn btn-success btn-xs" title="Edit Order">
					<i class="fas fa-edit"></i>
				</a>
				<a href="{{url('order/view/details/'.$order->id)}}" class="btn btn-info" title="View Order Details">
					<span class="fas fa-eye"></span>
				</a>
				<a href="{{url('view/order/invoice/'.$order->id)}}" class="btn btn-primary" title="View Order Invoice">
					<i class="fas fa-info"></i>
				</a>
				<a href="{{url('order/invoice/pdf/download'.$order->id)}}" class="btn btn-warning" title="Order Invoice Download">
					<span class="fas fa-download"></span>
				</a>
				<a href="{{url('order/delete/'.$order->id)}}" class="btn btn-danger" onclick="return confirm('Are You sure want to delete this?');" title="Delete Order">
					<span class="fas fa-trash"></span>
				</a>
			</td>
		</tr>
		@endforeach

	</tbody>
</table>




@endsection 
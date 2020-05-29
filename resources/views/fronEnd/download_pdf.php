@extends('fronEnd.master')

@section('title')
HOME
@endsection

@section('mainContent')
<!-- //banner-top -->
<!-- banner -->
<div class="page-head">
	<div class="container">
		<h3>Check Out</h3>
	</div>
</div>

<!-- check out -->
<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<tr>
					<th>SL No.</th>
					<th>Product Name</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total Price Tk. </th>

				</tr>
				@php($i = 1)
				@php($sum = 0)

				@foreach($cartProducts as $cartProduct)
				<tr>
					
					<td>{{$i++}}</td>
					
					<td>{{$cartProduct->name}}</td>
					<td>TK. {{$cartProduct->price}}</td>
					<td>
						{{$cartProduct->quantity}}
					</td>
					
					<td>TK. {{$total = $cartProduct->price*$cartProduct->quantity}}</td>
				</tr>
				<?php  $sum = $sum+$total;	?>
				@endforeach
				
			</table>
		</div>
		<div class="checkout-left">	
			
			<div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".5s">
				<h4>Shopping basket</h4>
				<ul>
					@foreach($cartProducts as $cartProduct)

					<li>{{$cartProduct->name}} <span>TK. {{$cartProduct->price*$cartProduct->quantity}} </span></li>

					@endforeach
					<?php 
					if($sum!=0)
					{
						$cost = 30;
					}	
					else{
						$cost = 0;
					}

					?>
					<li>Shipping Cost  <span>TK. {{$cost}}</span></li>
					<li>Total <span>TK. <?php echo $orderTotal=$sum+$cost; 
					Session::put('orderTotal',$orderTotal);
					?> </span></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</hr><br>
	
</div>
</div>
</div>	
@endsection
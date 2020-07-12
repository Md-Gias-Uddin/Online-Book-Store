@extends('fronEnd.master')

@section('title')
HOME
@endsection

@section('mainContent')
<!-- //banner-top -->
<!-- banner -->

<!-- check out -->
<div class="checkout">
	<div class="container">
		<h3>My Shopping Bag</h3>
		<div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".5s">
			<table class="timetable_sub">
				<tr>
					<th>Remove</th>
					<th>SL No.</th>
					<th>Product Name</th>
					<th>Product Image</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Total Price Tk. </th>

				</tr>
				@php($i = 1)
				@php($sum = 0)

				@foreach($cartProducts as $cartProduct)
				<tr>
					<td>
						<a href="{{url('delete/cart/item/'.$cartProduct->id)}}" title ="Delete" class="btn btn-danger">
							<span class="glyphicon glyphicon-trash"></span>
						</a>
					</td>
					<td>{{$i++}}</td>
					
					<td>{{$cartProduct->name}}</td>
					<td><img src="{{asset($cartProduct->attributes->image)}}" alt="" height="100" width="100"></td>
					<td>TK. {{$cartProduct->price}}</td>
					<td>
						<form action="{{url('/update/cart/quantity')}}" method="post">
							@csrf
							<input type="number" name="quantity" value="{{$cartProduct->quantity}}"min="1">
							<input type="hidden" id="updateBtn" name="id" value="{{$cartProduct->id}}">
							<input type="submit" name="btn" value="Update">
						</form>
					</td>
					
					<td>TK. {{$total = $cartProduct->price*$cartProduct->quantity}}</td>
				</tr>
				<?php  $sum = $sum+$total;	?>
				@endforeach
				
			</table>
		</div>
		<div class="checkout-left">	

			<div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".5s">
				<a href="{{url('/')}}"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span>Continue Shopping	</a>
			</div>
			
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
	<div>
		@if(Session::get('customerId') && Session::get('shippingId') )
		<a href="{{url('/checkout/payment')}}" class="btn btn-primary pull-right">	Check Out</a>
		@elseif(Session::get('customerId')) )
		<a href="{{url('checkout/shipping')}}" class="btn btn-primary pull-right">	Check Out</a>
		@else
		<a href="{{url('/check-out')}}" class="btn btn-primary pull-right">	Check Out</a>
		@endif
	</div>
</div>
</div>
</div>	
@endsection
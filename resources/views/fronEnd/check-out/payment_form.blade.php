@extends('fronEnd.master')

@section('title')
Shipping
@endsection

@section('mainContent')
<hr/>

<div class="container"><!--  -->
	<div class="row">
		<div class="col-md-12">
			<h3 class="text-center"> Payment Method</h3>
			<hr/>
			<div class="well box box-primary">
				<form method="POST" action="{{url('order/payment')}}" >
					@csrf
					<table class="table table-bordered" >
						<caption>Select Payment Method</caption>
						<thead>
							
						</thead>
						<tbody>
							<tr>
								<th>Cash On delivery</th>
								<td><input type="radio" name="payment_type" value="cash"> Cash On delivery</td>
							</tr>

							<tr>
								<th>Bkash</th>
								<td><input type="radio" name="payment_type" value="Bkash"> Bkash</td>
							</tr>

							<tr>
								<th>Paypal</th>
								<td><input type="radio" name="payment_type" value="paypal"> Paypal</td>
							</tr>
							<tr>
								<th></th>
								<td><i class="text text-success"><input type="submit" name="btn" value="Confirm Order"></i></td>
							</tr>
						</tbody>
						
					</table>

				</form>

			</div>
		</div>
	</div>
</div>
@endsection
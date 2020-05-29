<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<link rel="stylesheet" href="{{asset('frontEnd/css/pdf.css')}}">
		<link rel="license" href="https://www.opensource.org/licenses/mit-license/">
		<script src="{{asset('frontEnd/css/pdf.js')}}"></script>
	</head>
	<body>
		<header>
			<h1>Invoice</h1>
			<address >
				<p>{{$customer->firstname.' '.$customer->lastname}}</p>
				<p>{{$customer->address}}</p>
				<p>{{$shipping->phoneNumber}}</p>
			</address>
			<span><img alt="" src="{{asset('frontEnd/images/dig.jpg')}}"><input type="file" accept="image/*"></span>
		</header>
		<article>
			<h1>Recipient</h1>
			<address >
				<p>Some Company<br>c/o Some Guy</p>
			</address>
			<table class="meta">
				<tr>
					<th><span >Invoice #</span></th>
					<td><span >{{$order->id}}</span></td>
				</tr>
				<tr>
					<th><span >Date</span></th>
				</thead>
					<td><span >{{$order->created_at}}</span></td>
				</tr>
				<tr>
					<th><span >Amount Due</span></th>
					<td><span id="prefix" >$</span><span>600.00</span></td>
				</tr>
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span >Item</span></th>
						<th><span >Description</span></th>
						<th><span >Rate</span></th>
						<th><span >Quantity</span></th>
						<th><span >Price</span></th>
					</tr>
				<tbody>
					<tr>
						<td><a class="cut">-</a><span >{{$shipping->full_name}}</span></td>
						<td><span >{{$shipping->email}}</span></td>
						<td><span data-prefix>$</span><span >150.00</span></td>
						<td><span >4</span></td>
						<td><span data-prefix>$</span><span>600.00</span></td>
					</tr>
				</tbody>
			</table>
			<a class="add">+</a>
			<table class="balance">
				<tr>
					<th><span >Total</span></th>
					<td><span data-prefix></span><span>TK. {{$order->order_total}}</span></td>
				</tr>
				<tr>
					<th><span >Amount Paid</span></th>
					<td><span data-prefix>$</span><span ></span></td>
				</tr>
				<tr>
					<th><span >Balance Due</span></th>
					<td><span data-prefix>$</span><span>90</span></td>
				</tr>
			</table>
		</article>
		<aside>
			<h1><span ></span></h1>
			<div >
				<p>{{$customer->email}}</p>
			</div>
		</aside>
	</body>
	
</html>
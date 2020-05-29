@extends('admin.master_dashboard')
@section('content')
</hr>
<table class= "table table-bordered table-hober" style="width:95%" align="center">
		<tr>
			<th>Product ID</th>
			<th>{{$product->id}}</th>
		</tr>
		<tr>
			<th>Product Name</th>
			<th>{{$product->product_name}}</th>
		</tr>
		<tr>
			<th>Category Name</th>
			<th>{{$product->category_name}}</th>
		</tr>
		
		<tr>
			<th>Manufacturer Name</th>
			<th>{{$product->manufacturer_name}}</th>
		</tr>
		<tr>
			<th>Product Price</th>
			<th>{{$product->product_price}}</th>
		</tr>
		<tr>
			<th>Product Quantity</th>
			<th>{{$product->product_quantity}}</th>
		</tr>
		<tr>
			<th>Product Short Description</th>
			<th>{{$product->product_short_description}}</th>
		</tr>
		<tr>
			<th>Product Long Description</th>
			<th>{{$product->product_long_description}}</th>
		</tr>
		<tr>
			<th>Product Image</th>
			<th><img src="{{asset($product->product_image)}}"  alt="" height="200" width="200"/></th>
		</tr>
		<tr>
			<th>Publication Status</th>
			<th>{{$product->publication_status==1? "Published":"Unpublished" }}</th>
		</tr>
</table>
@endsection
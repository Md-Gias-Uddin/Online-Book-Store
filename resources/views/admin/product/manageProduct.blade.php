@extends('admin.master_dashboard')
@section('content')
</hr>
<table class= "table table-bordered table-hober" style="width:95%" align="center">
	
	<thead>

		<tr>
			<th>Product Name</th>
			<th>Category Name</th>
			<th>Manufacturer Name</th>
			<th>Product Price</th>
			<th>Product Quantity</th>
			<th>Publication Status</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		
		@foreach($products as $product)
		<tr>
			<th scope="row"  align="center">{{$product->product_name}}</th>
			<td align="center">{{$product->category_name}}</td>
			<td align="center">{{$product->manufacturer_name}}</td>
			<td align="center">{{$product->product_price}}</td>
			<td align="center">{{$product->product_quantity}}</td>
			<td align="center">{{$product->publication_status==1? "Published":"Unpublished"}}</td>
			<td>
				<a href="{{url('product/view/'.$product->id)}}" title ="Product View" class="btn btn-info">
					<i class="fas fa-eye"></i>
				</a>
				<a href="{{url('product/edit/'.$product->id)}}" title ="Product Edit" class="btn btn-success">
					<i class="fas fa-edit"></i>
				</a>
				<a href="{{url('product/delete/'.$product->id)}}" title ="Product Delete" class="btn btn-danger" onclick="return confirm('Are You sure want to delete this?');">
					<span class="fas fa-trash"></span>
				</a>
			</td>
		</tr>
		@endforeach

	</tbody>
</table>




@endsection
@extends('admin.master_dashboard')
@section('content')
</hr>
<table class= "table table-bordered table-hober" style="width:70%" align="center">
	
	<thead>

		<tr><th>ID</th>
			<th>Category Name</th>
			<th>Category Description</th>
			<th>Publication Status</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		
		@foreach($categories as $category)
		<tr>
			<th scope="row"  align="center">{{$category->id}}</th>
			<td align="center">{{$category->category_name}}</td>
			<td align="center">{{$category->category_description}}</td>
			<td align="center">{{$category->publication_status==1? "Published":"Unpublished"}}</td>
			<td>
				<a href="{{url('category/edit/'.$category->id)}}" class="btn btn-success">
					<i class="fas fa-edit"></i>
				</a>
				<a href="{{url('category/delete/'.$category->id)}}" class="btn btn-danger" onclick="return confirm('Are You sure want to delete this?');">
					<span class="fas fa-trash"></span>
				</a>
			</td>
		</tr>
		@endforeach

	</tbody>
</table>




@endsection
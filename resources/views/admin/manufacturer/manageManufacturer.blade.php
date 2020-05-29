@extends('admin.master_dashboard')
@section('content')
</hr>
<table class= "table table-bordered table-hober" style="width:70%" align="center">
	
	<thead>

		<tr><th>ID</th>
			<th>Manufacturer Name</th>
			<th>Manufacturer Description</th>
			<th>Publication Status</th>
			<th>Action</th>
		</tr>
	</thead>

	<tbody>
		
		@foreach($manufacturers as $manufacturer)
		<tr>
			<th scope="row"  align="center">{{$manufacturer->id}}</th>
			<td align="center">{{$manufacturer->manufacturer_name}}</td>
			<td align="center">{{$manufacturer->manufacturer_description}}</td>
			<td align="center">{{$manufacturer->publication_status==1? "Published":"Unpublished"}}</td>
			<td>
				<a href="{{url('manufacturer/edit/'.$manufacturer->id)}}" class="btn btn-success">
					<i class="fas fa-edit"></i>
				</a>
				<a href="{{url('manufacturer/delete/'.$manufacturer->id)}}" class="btn btn-danger" onclick="return confirm('Are You sure want to delete this?');">
					<span class="fas fa-trash"></span>
				</a>
			</td>
		</tr>
		@endforeach

	</tbody>
</table>




@endsection
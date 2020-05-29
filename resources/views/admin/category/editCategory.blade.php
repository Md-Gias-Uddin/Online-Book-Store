@extends('admin.master_dashboard')


@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow-lg border-0 rounded-lg mt-1">
        <div class="card-header"></div>
        <div class="card-body">
          <form class ="form-horizontal" action="{{url('category/update')}}" method="POST" name="editCategoryForm">
            @csrf
            <div class="form-group">
              <label class="small mb-1" for="inputEmailAddress">Category Name</label>
              <input class="form-control" value="{{$categoryById->category_name}}" name="category_name" type="text" placeholder="Enter Name" />
             <input class="form-control" value="{{$categoryById->id}}" name="categoryId" type="hidden" placeholder="Enter Name" />
            </div> <!-- //debug check  kora id ashe kina & update er jonno id ta pass hoi-->
            <div class="form-group"><label class="small mb-1">Category Description</label>
              <textarea name="category_description" class="form-control">{{$categoryById->category_description}}</textarea>
            </div>
            <div class="form-group">
              <label class="small mb-1" for="inputPassword3">Publication Status</label>

              <div class="col-sm-12"><select class="form-control" name="publication_status">
                <option>Select Publication Status</option>  
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
              </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <button class="btn btn-success btn-block" name = "btn" >Update</button>
              </div>
            </div> 
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  document.forms['editCategoryForm'].elements['publication_status'].value = {{$categoryById->publication_status}}//eta korar cz,jodi onk gula status thake e.g,district name
</script>

@endsection
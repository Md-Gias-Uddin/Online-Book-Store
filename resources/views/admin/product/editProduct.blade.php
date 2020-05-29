@extends('admin.master_dashboard')


@section('content')

<div>
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <div class="card shadow-lg border-0 rounded-lg mt-1">
        <div class="card-header"></div>
        <div class="card-body">
          <form class ="form-horizontal" action="{{url('product/update')}}" method="POST"  enctype="multipart/form-data" name="editProductForm">
            @csrf
            <div class="form-group">
              <label class="small mb-1" for="inputEmailAddress">Product Name</label>
              <input class="form-control" value="{{$productById->product_name}}" name="product_name" type="text" placeholder="Enter Product Name" />

              <input class="form-control" value="{{$productById->id}}" name="productId" type="hidden" />

              <span class="text-danger">{{$errors->has('product_name')? $errors->first('product_name'):''}}</span><!-- error message field fillup na korle -->
            </div>


            <div class="form-group">
              <label class="small mb-1" for="inputPassword3">Select Category Name</label>
              <div class="col-sm-12"><select class="form-control" name="categoryId">
                <option>Select Category Name</option> 
                @foreach($categories as $category)
                <option value="{{$category->id}}"> {{$category->category_name}}</option>
                @endforeach
              </select>
            </div>
          </div> 


          <div class="form-group">
            <label class="small mb-1" for="inputPassword3">Select Manufacture Name</label>
            <div class="col-sm-12"><select class="form-control" name="manufacturerId">
              <option>Select Manufacturers Name</option> 
              @foreach($manufacturers as $manufacturer)
              <option value="{{$manufacturer->id}}"> {{$manufacturer->manufacturer_name}}</option>
              @endforeach
            </select>
          </div>
        </div> 

        <div class="form-group">
          <label class="small mb-1" for="inputEmailAddress">Product Price</label>
          <input class="form-control" value="{{$productById->product_price}}" name="product_price" type="number" placeholder="Enter Price" />
          <span class="text-danger">{{$errors->has('product_price')? $errors->first('product_price'):''}}</span>
        </div>

        <div class="form-group">
          <label class="small mb-1" for="inputEmailAddress">Product Quantity</label>
          <input class="form-control" value="{{$productById->product_quantity}}" name="product_quantity" type="number" placeholder="Enter Product Quantity" />
          <span class="text-danger">{{$errors->has('product_quantity')? $errors->first('product_quantity'):''}}</span>
        </div>

        <div class="form-group"><label class="small mb-1">Product Short Description</label>
          <textarea name="product_short_description" class="form-control">{{$productById->product_short_description}}</textarea>
          <span class="text-danger">{{$errors->has('product_short_description')? $errors->first('product_short_description'):''}}</span>
        </div>
        <div class="form-group"><label class="small mb-1">Product Long Description</label>
          <textarea name="product_long_description" class="form-control">{{$productById->product_long_description}}</textarea>
          <span class="text-danger">{{$errors->has('product_long_description')? $errors->first('product_long_description'):''}}</span>
        </div>

        <div class="form-group">
          <label class="small mb-1" for="inputEmailAddress">Product Image</label>
          <input accept="image/*" name="product_image" type="file">
          <img src="{{asset($productById->product_image)}}"  alt="" height="150" width="150"/>
          <span class="text-danger">{{$errors->has('product_image')? $errors->first('product_image'):''}}</span>
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
          <button class="btn btn-success btn-block" name = "btn" >Update Product Info</button>

        </div>
      </div> 
    </form>
  </div>
</div>
</div>
</div>
</div>
<script>
  document.forms['editProductForm'].elements['publication_status'].value = {{$productById->publication_status}}
  document.forms['editProductForm'].elements['categoryId'].value = {{$productById->categoryId}}
  document.forms['editProductForm'].elements['manufacturerId'].value = {{$productById->manufacturerId}}
  //eta korar cz,jodi onk gula status thake e.g,district name
</script>
@endsection


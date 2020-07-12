@extends('fronEnd.master')




@section('mainContent')

<div class="single">
	<div class="container">
		<div class="col-md-6 single-right-left animated wow slideInUp animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInUp;">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<!-- FlexSlider -->
					<script>
						// Can also be used with $(document).ready()
						$(window).load(function() {
							$('.flexslider').flexslider({
								animation: "slide",
								controlNav: "thumbnails"
							});
						});
					</script>
					<!-- //FlexSlider-->
					<ul class="slides">
						
						<li data-thumb="{{asset($productById->product_image)}}">
							<div class="thumb-image"> <img src="{{asset($productById->product_image)}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb="{{asset($productById->product_image)}}">
							<div class="thumb-image"> <img src="{{asset($productById->product_image)}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>	
						<li data-thumb="{{asset($productById->product_image)}}">
							<div class="thumb-image"> <img src="{{asset($productById->product_image)}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb="{{asset($productById->product_image)}}">
							<div class="thumb-image"> <img src="{{asset($productById->product_image)}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>	
						
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-6 single-right-left simpleCart_shelfItem animated wow slideInRight animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: slideInRight;">
			<h3>{{$productById->product_name}}</h3>
			<p><span class="item_price">BDT {{$productById->product_price}}</span> </p>
			

			<form class ="form-horizontal" action="{{url('/add-to-cart')}}" method="POST">
				@csrf
				<div class="color-quality">
					<div class="color-quality-right">
						<h5>Quantity :</h5>
						<input type="number" name="qty" value="1" min="1">
						<input type="hidden" name="id" value="{{$productById->id}}" >
					</div>
				</div>
				<!-- <div class="occasional">
					<h5>Types :</h5>
					<div class="colr ert">
						<label class="radio"><input type="radio" name="radio" checked=""><i></i>Casual Shoes</label>
					</div>
					<div class="colr">
						<label class="radio"><input type="radio" name="radio"><i></i>Sports Shoes</label>
					</div>
					<div class="colr">
						<label class="radio"><input type="radio" name="radio"><i></i>Formal Shoes</label>
					</div>
					<div class="clearfix"> </div>
				</div> --><br>
				<div class="occasion-cart">
					<input type="submit" name="btn" value = "Add to Cart" class="item_add hvr-outline-out button2"/>
				</div>


			</form>

		</div>
		<div class="clearfix"> </div>

		
				
				<div id="myTabContent" class="tab-content">

					<div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab" >
						<h5>Product Brief Description</h5>
						<p>{{$productById->product_short_description}}</p>
					</div>
					<div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
						<div class="bootstrap-tab-text-grids">
							<div class="bootstrap-tab-text-grid">
								<div class="bootstrap-tab-text-grid-left">
									<img src="{{asset('frontEnd/images/men3.jpg')}}" alt=" " class="img-responsive">
								</div>
								
								<div class="clearfix"> </div>
							</div>

							
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
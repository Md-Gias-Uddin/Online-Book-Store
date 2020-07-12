@extends('fronEnd.master')

@section('title')
HOME
@endsection

@section('mainContent')

<!-- //banner -->
<!-- content -->

<!-- //content -->

<!-- content-bottom -->

<div class="content-bottom">
    
    
    <div class="clearfix"></div>
</div>
<!-- //content-bottom -->
<!-- product-nav -->

<div class="product-easy">
    <div class="container">
        
        <script src="{{asset('frontEnd/js/easyResponsiveTabs.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#horizontalTab').easyResponsiveTabs({
                                    type: 'default', //Types: default, vertical, accordion           
                                    width: 'auto', //auto or any width like 600px
                                    fit: true   // 100% fit in a container
                                });
                            });
                            
        </script>
        <div class="sap_tabs">
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item" aria-controls="tab_item-0" role="tab"><span>All Books</span></li> 
                    
                </ul>                    
                <div class="resp-tabs-container">
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
                        @foreach($published_products as $published_product)
                        <div class="col-md-3 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                                <div class="men-thumb-item">
                                    <img src="{{asset($published_product->product_image)}}" alt="" class="pro-image-front" height="200" width="200">
                                    <img src="{{asset($published_product->product_image)}}" alt="" class="pro-image-back" height="200" width="200">
                                        <div class="men-cart-pro">
                                            <div class="inner-men-cart-pro">
                                                <a href="{{url('/quickView/'.$published_product->id.'/'.$published_product->product_name)}}" class="link-product-add-cart">Quick View</a>
                                            </div>
                                        </div>
                                        <span class="product-new-top">New</span>
                                        
                                </div>
                                <div class="item-info-product ">
                                    <h4><a href="{{url('/quickView/'.$published_product->id)}}">{{$published_product->product_name}}</a></h4>
                                    <div class="info-product-price">
                                        <span class="item_price">BDT {{$published_product->product_price}}</span>
                                    </div>
                                    <a href="{{url('/quickView/'.$published_product->id.'/'.$published_product->product_name)}}" class="item_add single-item hvr-outline-out button2">Add to cart</a>                                    
                                </div>
                            </div>
                        </div>
                        @endforeach

                       
                        <div class="clearfix"></div>
                    </div>
                    
                        <div class="col-md-3 product-men">
                            <div class="men-pro-item simpleCart_shelfItem">
                       
                       
                        
                        
                        
                        
                        <div class="clearfix"></div>                        
                    </div>
                    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
                    
                        
                        
                        
                        
                        <div class="clearfix"></div>        
                    </div>  
                </div>  
            </div>
        </div>
    </div>
</div>
@endsection



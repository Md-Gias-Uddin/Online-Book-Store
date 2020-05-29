<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;


class WelcomeController extends Controller
{
    public function index(){
     $published_products = Product::where('publication_status',1)->get();
     return view('fronEnd.home.homeContent',['published_products'=>$published_products]);
 }


 public function category($id){
   $publishedCategoryProducts=Product::where('categoryId',$id)
                          ->where('publication_status',1)
                          ->get();
   return view('fronEnd.category.categoryContent',['publishedCategoryProducts'=>$publishedCategoryProducts]);
}

public function contact(){

   return view('fronEnd.contactUs.contactContent');
}

public function quickView($id){
    $productById=Product::where('id',$id)->first();

   return view('fronEnd.category.singleView.quickView',['productById'=>$productById]);
}

}

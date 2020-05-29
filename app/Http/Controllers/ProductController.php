<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacturer;
use App\Product;
use DB;

class ProductController extends Controller
{
	public function createProduct(){
		$categories = Category::where('publication_status',1)->get();
		$manufacturers = Manufacturer::where('publication_status',1)->get();

		return view('admin.product.createProduct',['categories'=>$categories,'manufacturers'=>$manufacturers]);
	}

	public function storeProduct(Request $request){
		$this->validate($request,[
			'product_name'=>'required',
			'product_price'=>'required',
			'product_quantity'=>'required',
			'product_short_description'=>'required',
			'product_long_description'=>'required',
		]);
            //return $request->all();
		//if($request->hasFile('product_image')){
		$product_image=$request->file('product_image');
		$name = $product_image->getClientOriginalName();
		$upload_path='productImg/';
		$product_image->move($upload_path,$name);
		$imageUrl=$upload_path.$name;
		$this->saveProductInfo($request,$imageUrl);
		return redirect('product/add')->with('message','data saved');	
		

	}

	protected function saveProductInfo($request,$imageUrl)
	{
		$product=new Product();
		$product->product_name=$request->product_name;
		$product->categoryId=$request->categoryId;
		$product->manufacturerId=$request->manufacturerId;
		$product->product_price=$request->product_price;
		$product->product_quantity=$request->product_quantity;
		$product->product_short_description=$request->product_short_description;
		$product->product_long_description=$request->product_long_description;
		$product->product_image=$imageUrl;
		$product->publication_status=$request->publication_status;
		$product->save();

	}

	public function manageProduct(){
		/*$products=Product::all();
		echo '<pre>';
		print_r($products);
		exit;*/
		$products=DB::table('products')//query builder
		->join('categories','products.categoryId','=','categories.id')
		->join('manufacturers','products.manufacturerId','=','manufacturers.id')
		->select('products.id','products.product_name','products.product_price','products.product_quantity','products.publication_status','categories.category_name','manufacturers.manufacturer_name')
		->get();
			/*echo '<pre>';
		print_r($products);
		exit;*/
		return view('admin.product.manageProduct',['products'=>$products]);
	}
	public function viewProduct($id){
		$productById=DB::table('products')//query builder
		->join('categories','products.categoryId','=','categories.id')
		->join('manufacturers','products.manufacturerId','=','manufacturers.id')
		->select('products.*','categories.category_name','manufacturers.manufacturer_name')
		->where('products.id', $id)
		->first();
			/*echo '<pre>';
		print_r($products);
		exit;*/
		return view('admin.product.viewProduct',['product'=>$productById]);

		//second method
		/*return view('admin.product.viewProduct')//eker odhik hole
		->with('product',$productById);
		->with('product',$productById);
		->with('product',$productById);*/


	}


	public function editProduct($id){//$categories = Category mane $categories = new Category()
		$categories = Category::where('publication_status',1)->get();
		$manufacturers = Manufacturer::where('publication_status',1)->get();
        $productById=Product::where('id',$id)->first();//ekta data ashle first else get() use korte hobe
        return view('admin.product.editProduct',['productById'=>$productById,'categories'=>$categories,'manufacturers'=>$manufacturers]);

       //second method
		/*return view('admin.product.editProduct')//eker odhik hole
		->with('productById',$productById);
		->with('categories',$categories);
		->with('manufacturers',$manufacturers);*/
	}

	public function updateProduct(Request $request){
		$imageUrl = $this->imageExistStatus($request);
		$product=new Product();
		$product->product_name=$request->product_name;
		$product->categoryId=$request->categoryId;
		$product->manufacturerId=$request->manufacturerId;
		$product->product_price=$request->product_price;
		$product->product_quantity=$request->product_quantity;
		$product->product_short_description=$request->product_short_description;
		$product->product_long_description=$request->product_long_description;
		$product->product_image=$imageUrl;
		$product->publication_status=$request->publication_status;
		$product->save();
		return redirect('product/add')->with('message','data saved');

	}

	private function imageExistStatus($request){
		$productById = Product::where('id', $request->productId)->first();
		$product_image = $request->file('product_image');
		if($product_image)
		{
			unlink($productById->product_image);
			$product_image=$request->file('product_image');
			$name = $product_image->getClientOriginalName();
			$upload_path='productImg/';
			$product_image->move($upload_path,$name);
			$imageUrl=$upload_path.$name;
		}
		else{

			$imageUrl = $productById->product_image;

		}

		return $imageUrl;

	}


	public function deleteProduct($id){
		$product=Product::find($id);
		$product->delete();
    	return redirect('product/manage')->with('message','Data deleted successfully');//same 


 } 
}
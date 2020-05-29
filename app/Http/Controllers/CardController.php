<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Cart;

class CardController extends Controller
{
    public function addTocart(Request $request)
    {
    	/*return $request->all();*/

    	$product = Product::find($request->id);

    	Cart::add([
    		'id'=>$request->id,
    		'name'=>$product->product_name,
    		'price'=>$product->product_price,
    		'quantity'=>$request->qty,
    		'attributes'=>array('image'=>$product->product_image)

    		

    	]);

    	return redirect('/show/card');

    }

    public function showCart(){
    	$cartProducts = Cart::getContent();
    	//return $cartProducts;
    	return view('fronEnd.cart.showCart',['cartProducts'=>$cartProducts]);
    }
    public function deleteCartitem($id){
        Cart::remove($id);
        //return $cartProducts;
        return redirect('/show/card');
    }

    public function updateCartquantity(Request $request){
        Cart::update($request->id,
          array(
            'quantity' => array(
              'relative' => false,
              'value' => $request->quantity 
          ),
      ));
        return redirect('/show/card');
    }
}

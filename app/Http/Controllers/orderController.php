<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Order;
use App\customer;
use App\Shipping;
use App\OrderDetil;
use App\Payment;


class orderController extends Controller
{
	public function manageOrder(){
		$orders = DB::table('orders')
		->join('customers','orders.customer_id','=','customers.id')
		->join('payments','orders.id','=','payments.order_id')
		->select('orders.*','customers.firstname','customers.lastname','payments.payment_type','payments.payment_status')
		->get();
    		//return $orders;			
		return view ('admin.order.manage_order',['orders'=>$orders]);
	}
	public function viewOrderDetails($id){
		$order = Order::find($id);
		$customer = customer::find($order->customer_id);
		$shipping = Shipping::find($order->shipping_id);
		$payment = Payment::where('order_id', $order->id)->first();/*eta kora hoiche cz orders table e payment ullek nai & first dewa hoiche ejonno ekjoner order er against e ekta payment thake  */
		$orderDetails = OrderDetil::where('order_id', $order->id)->get();

		return view ('admin.order.view_order',[
			'customer'=>$customer,
			'shipping'=>$shipping,
			'payment'=>$payment,
			'orderDetails'=>$orderDetails,
			'order'=>$order


		]);
	}

	public function viewOrderinvoice($id){
		return view ('admin.order.view_order_invoice');
	}
	public function deleteOrder($id){
		$order = Order::find($id);
		$order->delete();
		return redirect('order/manage')->with('message','Data deleted successfully'); 

	}

}

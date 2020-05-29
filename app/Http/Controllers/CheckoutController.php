<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\customer;
use App\Shipping;
use Mail;
use Cart;
use Session;
use App\Order;
use App\Payment;
use App\OrderDetil;
use PDF;

class CheckoutController extends Controller
{
    public function index(){
    	return view('fronEnd.check-out.checkout-content');
    }

    public function customerRegister(Request $request){

    	//return $request->all();
        $this->validate($request,[
            'email'=> 'email | unique:customers,email'
        ]);



        $customer = new customer();
        $customer->firstname = $request->firstname;
        $customer->lastname = $request->lastname;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phoneNumber = $request->phoneNumber;
        $customer->password = bcrypt($request->password);
        $customer->districtName = $request->districtName;
        $customer->save();

        $customerId = $customer->id;
        Session::put('customerId',$customerId);
        Session::put('customer_name',$customer->firstname.' '.$customer->lastname);

        $data = $customer->toArray();


        
        //sending confirmation mail
    	Mail::send('fronEnd.mails.confirmation_mail', $data,function ($message) use ($data) {
            $message->to($data['email']);
            $message->subject('confirmation_mail');

        });
        echo "Basic Email Sent. Check your inbox.";
        return redirect('checkout/shipping');
    }


    public function shippingForm(){
        $customer = customer::find(Session::get('customerId'));
        return view('fronEnd.check-out.shipping',['customer'=>$customer]);
    }

    public function saveShipping(Request $request){
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email = $request->email;
        $shipping->address = $request->address;
        $shipping->phoneNumber = $request->phoneNumber;
        $shipping->districtName = $request->districtName;
        $shipping->save();

        Session::put('shippingId',$shipping->id);
        return redirect('/checkout/payment');
    }

    public function paymentForm()
    {
        return view('fronEnd.check-out.payment_form');
    }
    public function customerLoginCheck(Request $request)
    {
        $customer = customer::where('email',$request->email)->first();
        if($customer && password_verify($request->password, $customer->password))
        {
            Session::put('customerId',$customer->id);
            Session::put('customer_name',$customer->firstname.' '.$customer->lastname);

            return redirect('/checkout/shipping');
        }
        else{
         return redirect('/check-out')->with('message', 'Invalid 
            Credentials Entered');
     }

     }
    public function completeOrder($id)
    {    
         $order = Order::find($id);
        $customer = customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $payment = Payment::where('order_id', $order->id)->first();/*eta kora hoiche cz orders table e payment ullek nai & first dewa hoiche ejonno ekjoner order er against e ekta payment thake  */
        $orderDetails = OrderDetil::where('order_id', $order->id)->get();

        $pdf = PDF::loadView('fronEnd.invoice.invoice',[
            'customer'=>$customer,
            'shipping'=>$shipping,
            'payment'=>$payment,
            'orderDetails'=>$orderDetails,
            'order'=>$order


        ]);/*$pdf = PDF::loadViewreturn view('fronEnd.check-out.download_pdf');*/
        return $pdf->download('mem.pdf');
    }
    public function customerLogout()
    {
        Session::forget('customerId');
        Session::forget('shippingId');

        return redirect('/');
    }
    public function newCustomerLogin()
    {
        return view('fronEnd.customer.customer_login');
        return redirect('/');
    }
public function downloadPdf(){
        /*$order = Order::find($id);
        $customer = customer::find($order->customer_id);
        $shipping = Shipping::find($order->shipping_id);
        $payment = Payment::where('order_id', $order->id)->first();/*eta kora hoiche cz orders table e payment ullek nai & first dewa hoiche ejonno ekjoner order er against e ekta payment thake  
        $orderDetails = OrderDetil::where('order_id', $order->id)->get();

        //return view ('admin.order.view_order',[
            
        //]);
            //return $orders;           
       // $data = ('admin.order.manage_order',['orders'=>$orders]);
    $pdf = PDF::loadView('hello',['customer'=>$customer,
            'shipping'=>$shipping,
            'payment'=>$payment,
            'orderDetails'=>$orderDetails,
            'order'=>$order]);
            return $pdf->download('medium.pdf');  */
        }
        public function orderPayment(Request $request)
        {
            $paymentType = $request->payment_type;

            if($paymentType=='cash'){
                $order = new Order();
            $order->customer_id = Session::get('customerId');//
            $order->shipping_id = Session::get('shippingId');//line 64
            $order->order_total = Session::get('orderTotal');//from showcart.blade.php
            $order->save();

            
            $payment = new Payment();

            $payment->order_id = $order->id;//
            $payment->payment_type = $paymentType;
            $payment->order_total = Session::get('orderTotal');
            $payment->save();

            $cartProducts = Cart::getContent();
            foreach($cartProducts as $cartProduct){
                $orderDetail = new OrderDetil();
                $orderDetail->order_id = $order->id;
                $orderDetail->product_id = $cartProduct->id;
                $orderDetail->product_name = $cartProduct->name;
                $orderDetail->product_price = $cartProduct->price;
                $orderDetail->product_quantity = $cartProduct->quantity;
                $orderDetail->save();

            }
            //Cart::distroy();
            return redirect('complete/order/'. $order->shipping_id);
        }
        else if($paymentType=='paypal'){



        }else if($paymentType=='Bkash'){



        }
    }
}

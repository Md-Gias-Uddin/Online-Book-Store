<!DOCTYPE html>
<html>
<head>
    <style type="text/css"> tr:nth-child(even) {background-color: #f2f2f2;}  th:nth-child(even) {background-color: #f1f1f1;} </style>
</head>
<body>
</hr>


<h3 class="text-center text-success"> Customer info for this order</h3>
<table class= "table table-bordered table-hober thead-dark" style="width:90%" align="center">

    <tr>
        <th>Customer Name</th>
        <td>{{$customer->firstname.' '.$customer->lastname}}</td>
    </tr>

    <tr>
        <th>Phone Number</th>
        <td>{{$customer->phoneNumber}}</td>
    </tr>

    <tr>
        <th>Email Address</th>
        <td>{{$customer->email}}</td>
    </tr>

    <tr>
        <th>Address</th>
        <td>{{$customer->address}}</td>
    </tr>
</table>

<h3 class="text-center text-success"> Order Details info for this order</h3>
<table class= "table table-bordered table-hober thead-dark" style="width:90%" align="center">

    <tr>
        <th>Order No.</th>
        <td>{{$order->id}}</td>
    </tr>

    <tr>
        <th>Order Total</th>
        <td>TK. {{$order->order_total}}</td>
    </tr>

    <tr>
        <th>Order Date</th>
        <td>{{$order->created_at}}</td>
    </tr>

    <tr>
        <th>Order Status</th>
        <td>{{$order->order_status}}</td>
    </tr>
</tr>
</table>

<h3 class="text-center text-success"> Shipping info for this order</h3>
<table class= "table table-bordered table-hober" style="width:90%" align="center">
    

    <tr>
        <th>Full Name</th>
        <td>{{$shipping->full_name}}</td>
    </tr>

    <tr>
        <th>Phone Number</th>
        <td>{{$shipping->phoneNumber}}</td>
    </tr>

    <tr>
        <th>Email Address</th>
        <td>{{$shipping->email}}</td>
    </tr>

    <tr>
        <th>Address</th>
        <td>{{$shipping->Address}}</td>
    </tr>


</tr>
</table>
<h3 class="text-center text-success"> Payment Info for this order</h3>
<table class= "table table-bordered table-hober thead-dark" style="width:90%" align="center">
    

    <tr>
        <th>Payment Type</th>
        <td>{{$payment->payment_type}}</td>
    </tr>

    <tr>
        <th>Payment Status</th>
        <td>{{$payment->payment_status}}</td>
    </tr>



</tr>
</table>

</hr><h3 class="text-center text-success"> Product Info for this order</h3>
<table class= "table table-bordered table-hober" style="width:90%" align="center">
    
    <thead class="thead-dark">
        <style type="text/css">
           
table {
  border-collapse: collapse;
}

table, th, td {
  border: 1px solid black;
} 
        </style>
        <tr scope ="row" align="center">
            <th>SL No. </th>
            <th>Product Id</th>
            <th>Product Name</th>
            <th>Product Price</th>
            <th>Product Quantity</th>
            <th>Total Amount. </th>
            
        </tr>
    </thead>

    <tbody>
        @php($i=1)
        @foreach($orderDetails as $orderDetail)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$orderDetail->product_id}}</td>
            <td>{{$orderDetail->product_name}}</td>
            <td>TK. {{$orderDetail->product_price}}</td>
            <td>{{$orderDetail->product_quantity}}</td>
            <td>TK. {{$orderDetail->product_price*$orderDetail->product_quantity}}</td>
        </tr>
        @endforeach

    </tbody>
</table>

</body>
</html>
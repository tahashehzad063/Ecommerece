<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Pdf</title>
</head>
<body>
    <h1 class="text-center fw-bold">Order Details</h1>
    Customer Name : <h3>{{$order->name}}</h3>
   Customer Email : <h3>{{$order->email}}</h3>
   Customer Phone : <h3>{{$order->phone}}</h3>
   Customer address : <h3>{{$order->address}}</h3>
   Customer Id : <h3>{{$order->user_id}}</h3>
   Product Title : <h3>{{$order->product_title}}</h3>
   Product Price: <h3>{{$order->price}}</h3>
   Product Quantity: <h3>{{$order->quantity}}</h3>
   Product Payment: <h3>{{$order->payment_status}}</h3>
   Product Delivery: <h3>{{$order->delivery_status}}</h3>
   Product ID: <h3>{{$order->product_id}}</h3>
   <br>
   <br>
    Image:<img style="height: 200px;width:500px;" src="product/{{$order->image}}" alt="">
</body>
</html>
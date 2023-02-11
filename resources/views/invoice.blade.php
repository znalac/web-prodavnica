<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ivoice</title>
    <style>
       body{
background:#eee;
margin-top:20px;
}
.text-danger strong {
        	color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #9f181c;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}	
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}
		
		#container {
			background-color: #dcdcdc;
		} 
    </style>
</head>
<body>
    @php
    $total = 0;
@endphp 
    <div class="container">
        <div class="col-md-12">   
            <div class="row">
                   
                   <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                       <div class="row">
                           <div class="receipt-header">
                               <div class="col-xs-6 col-sm-6 col-md-6">
                                   
                               </div>
                               <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                                 <h3>Payment method: Paypal</h3>
                               </div>
                           </div>
                       </div>
                       
                       <div class="row">
                           <div class="receipt-header receipt-header-mid">
                               <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                   <div class="receipt-right">
                                       <h5>Customer Name : {{$order->name}} </h5>
                                       <p><b>Email :</b> {{$order->email}} </p>
                                       <p><b>Address :</b> {{$order->delivery_adress}} </p>
                                       <p> {{$order->postal_code}} | {{$order->city}} </p>
                                   </div>
                               </div>
                               <div class="col-xs-4 col-sm-4 col-md-4">
                                   <div class="receipt-left">
                                       <h3>INVOICE # {{ $order->id}}</h3>
                                   </div>
                               </div>
                           </div>
                       </div>
                       
                       <div>
                           <table class="table table-bordered">
                               <thead>
                                   <tr>


                                        <th>Product name</th>
                                       <th> Product Description</th>
                                       <th>Price</th>
                                       <th>Quantity</th>
                                       <th>Clothes size</th>
                                       
                                   </tr>
                               </thead>
                               <tbody>
                              
                                    @foreach ($properties as $item)
                                       <tr>
                                        <td>{{$item->product->product_name}}</td>
                                        <td>{{$item->product->description}}</td>
                                        <td>€{{number_format($item->price, 2, ',', '.')}}</td>
                                        <td>{{$item->qty}}</td>
                                        <td>{{$item->clothes_sizes}}</td>
                                    </tr>
                                    @php
                                    $total += $item->price * $item->qty;
                                @endphp
                                    @endforeach
                                    <td> Total: €{{number_format($total, 2, ',', '.')}}</td>
                               </tbody>
                           </table>
                       </div>
                       
                       <div class="row">
                           <div class="receipt-header receipt-header-mid receipt-footer">
                               <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                                   <div class="receipt-right">
                                       <p><b>Date :</b> {{ $order->created_at->format('d-m-Y') }}</p>
                                       <div class="receipt-right">
                                        <h5>Company Name.</h5>
                                        <p>+1 3649-6589 <i class="fa fa-phone"></i></p>
                                        <p>company@gmail.com <i class="fa fa-envelope-o"></i></p>
                                        <p>USA <i class="fa fa-location-arrow"></i></p>
                                    </div>
                                     
                                   </div>
                               </div>
                               <div class="col-xs-4 col-sm-4 col-md-4">
                                   <div class="receipt-left">
                                       
                                   </div>
                               </div>
                           </div>
                       </div>
                       
                   </div>    
               </div>
           </div> 
    </div>
</body>
</html>
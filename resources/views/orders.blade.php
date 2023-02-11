


@section('title')
    Orders
@endsection


@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
 <div class="col-sm-6 offset-sm-3">
    @php
    $total = 0;
    @endphp
@if ($orders->isNotEmpty())
<table class="table">
    <thead>
        <tr>
            
            <th>Product name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
           <th>clothes sizes</th>
            <th>Image</th>
            
            
            
           
           
            
        </tr>
    </thead>
    <tbody>
  
        @foreach($orders  as $order)
        <tr>
            <td>{{ $order->product->product_name}}</td>
            <td style="width:65%">{{ $order->product->description }}</td>
            <td> €{{number_format($order->price, 2, ',', '.')}}</td> 
            <td>{{ $order->qty}}</td>
            <td>{{$order->clothes_sizes}}</td>
            <td><img src="/images/{{$order->product->image1}}" alt="" class="img-fluid" ></td>
          
        </tr>
        @php
        $total += $order->price * $order->qty;
    @endphp
        @endforeach
        
      <td> Total: €{{number_format($total, 2, ',', '.')}}</td>
       
    </tbody>
</table>
@else
    
@endif
    


</div>   

</div>    

</div> 
@endsection
@section('title')
    Users orders
@endsection
@extends('admin.master')

@section('content')
    <div class="container mt-5 ">
     
            @if($Shipped_Item->isNotEmpty())
            @if ($message = Session::get('success'))
               <div class="alert alert-success mt-4">{{ $message}}</div>
            @endif
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>Postal code</th>
                        <th>E-mail</th>
                        <th>Delivery address</th>
                        <th>Invoice address</th>
                        <th>Payment id</th>
                        <th>Payment method</th>
                        <th>status</th>
                        <th>Shipped date</th>
                        
                        
                        
                        
                        
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($Shipped_Item as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->city}}</td>
                        <td>{{$order->country}}</td>
                        <td>{{$order->postal_code}}</td>
                        <td>{{$order->email}}</td>
                     


                       
                     
                     

                       
                        <td>{{$order->delivery_adress}}</td>
                        <td>{{$order->invoice_adress}}</td>
                        
                       
                        
                       
                      
                         <td>{{$order->payment_id}}</td>
                         <td>{{$order->payment_method}}</td>
                      @if ($order->shipped_status == 1)
                      <td>
                        Shipped  
                    </td> 
                      @endif

                      <td>
                        {{$order->updated_at->format('d-m-Y')}}  
                    </td> 
                    @endforeach
                    </tr>
                </tbody>
            </table>
            @else
                <div class="alert alert-info category">
                    No orders yet!!!
                </div>
            @endif 
      
    </div>
@endsection
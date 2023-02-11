@section('title')
    Users orders
@endsection
@extends('admin.master')

@section('content')
    <div class="container mt-5 ">
     
            @if($orderItem->isNotEmpty())
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
                        <th>payment_method</th>
                        
                       <th>Status</th>
                        
                        
                        
                        
                      
                    </tr>
                </thead>
                <tbody>
                    @foreach($orderItem as $order)
                    <tr>
                        <td>{{$order->name}}</td>
                        <td>{{$order->city}}</td>
                        <td>{{$order->country}}</td>
                        <td>{{$order->postal_code}}</td>
                        <td>{{$order->email}}</td>
                       
                     
                 

                        
                        <td>{{$order->invoice_adress}}</td>
                        <td>{{$order->delivery_adress}}</td>
                        
                        
                        
                       
                        
                         <td>{{$order->payment_id}}</td>
                         <td>{{$order->payment_method}}</td>
                         <td>
                             <form action="/admin-orders/{{$order->id}}" method="post">
                                @csrf
                                @method('put')
                                <select name="status" class="form-control">
                                    <option @if($order->shipped_status == 0) selected @endif value="0">Unshipped</option>
                                    <option @if($order->shipped_status == 1) selected @endif value="1">Shipped</option>
                                </select>
                                <button type="submit" class="form-control btn btn-primary"> Update  </button>
                             </form>
                         </td>
                         <td> <a href="/admin/orders/{{$order->id}}" class="btn btn-info">View</a> </td>
                
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
@section('title')
    Products
@endsection
@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
        @can( 'create products' )
            <a href="/admin/create/products" class="btn btn-primary new-category"> Add products </a>
        @endcan
            @if($products->isNotEmpty())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th> Product name</th>
                        <th>Description</th>
                        <th >Price</th>
                        <th>Quantity</th>
                        <th style="width:10%">image1</th>
                        <th style="width:10%">image2</th>
                        <th style="width:10%" >image3</th>
                        <th style="width:10%">image4</th>
                        <th style="width:10%">image5</th>
                        <th style="width:10%">image6</th>
                        <th style="width:10%">image7</th>
                        <th style="width:10%">image8</th>
                        <th style="width:10%">image9</th>
                        <th style="width:10%">image10</th>
                    
                       
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{ $product->product_name }}</td>
                     
                        <td  style="width: 65%;">{{ $product->description }}</td>
                        <td>€{{number_format($product->price, 2, ',', '.')}}</td>
                        <td>{{ $product->qty }}</td>
                        <td style=""><img src="/images/{{$product->image1}}" class="img-fluid"></td>
                        <td><img src="/images/{{$product->image2}}" class="img-fluid"></td>
                        <td ><img src="/images/{{$product->image3}}" class="img-fluid"></td>
                        <td><img src="/images/{{$product->image4}}" class="img-fluid"></td>
                        <td><img src="/images/{{$product->image5}}" class="img-fluid"></td>
                        <td ><img src="/images/{{$product->image6}}" class="img-fluid"></td>
                        <td><img src="/images/{{$product->image7}}" class="img-fluid"></td>
                        <td><img src="/images/{{$product->image8}}" class="img-fluid"></td>
                        <td><img src="/images/{{$product->image9}}" class="img-fluid"></td>
                        <td><img src="/images/{{$product->image10}}" class="img-fluid"></td>
                     
                        <td>
                            
                            <a href="/admin/product/{{$product->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                            <form action="/admin/product/{{$product->id}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm mt-2" type="submit">Delete</button>
                            </form>
                        </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
            @else
                <div class="alert alert-info category">
                    No products yet!!!
                </div>
            @endif 
            @if ($msg = Session::get('success'))
            <div class="alert alert-success">
             {{$msg}}
            </div>
         @endif
         @if ($msg = Session::get('update'))
         <div class="alert alert-success">
          {{$msg}}
         </div>
      @endif
      @if ($msg = Session::get('delete'))
      <div class="alert alert-success">
       {{$msg}}
      </div>
   @endif

    </div>
    </div>
    </div>
@endsection
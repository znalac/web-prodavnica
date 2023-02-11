

@section('title')
    {{ $product->product_name}}
@endsection
@extends('layouts.app')


@section('content')

<div class="container ">
    <div class="row justify-content-center">
        <div class="col-sm-4">
            <a class="mainlink swipebox" title="{{  $product->product_name }}" href="/images/{{$product->image1}}" ><img src="/images/{{$product->image1}}" class="img-fluid main"> </a>
        </div>
        <div class="col-sm-4">

            <p> {!! nl2br($product->description) !!} </p>
            @if( $product->qty>=100 ||$product->qty> 50 )
            <span>In stock</span>
        @elseif( $product->qty<= 50 && $product->qty> 0)
        <span> Left {{$product->qty}} only </span>
        @else
          <span> Out of stock</span>
        @endif
        <br> <span> Price: €{{number_format($product->price, 2, ',', '.')}}</span>

        @if ($product->qty>0 )
                @if (Auth::check())
                    
                <form action="/product/{{$product->id}}" method="post">
                    @csrf
                 
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                    <input type="hidden" name="product_name" value="{{ $product->product_name }}">
                    <input type="hidden" name="product_description" value="{{ $product->description }}">
                    <input type="hidden" name="product_price" value="{{ $product->price}}">
                    <label for="qty"> Choose a quantity</label>
                    <input type="number" name="qty" value="1" step="1" min="1">
                 
                    <input type="hidden" name="product_image" value="{{ $product->image1}}">
                       
                
                     
                @if($product->category->name == "Techno Viking")
                    <label for="size"> Choose clothes size  </label>
                 <select name="size" class="down" >
                     
                    @foreach ($product->sizes as $size)
                        <option value="{{ $size->clothes_size }}">{{  $size->clothes_size }}</option>
                    @endforeach

                  </select>
                @endif
                  
                 
                     
                       
                    <button type="submit" class="cart">Add To Cart</button>
                    
                
                  

                
                </form>
                @else
                <div class="alert alert-danger">
                    To purchase products, you must be logged in! 
                  </div>
                @endif
          
                 
                @if ($msg = Session::get('success'))
                    <div class="alert alert-success">
                        {{$msg}}
                    </div>
                @endif
                
               

                @endif
            
    
        </div>
      
    </div>

    
      <div class="row">
          
            <div class="holder">
             <a href="/images/{{$product->image2}}" class="swipebox">   <img src="/images/{{$product->image2}}" class="img-fluid "></a>
                <a href="/images/{{$product->image3}}" class="swipebox"><img src="/images/{{$product->image3}}" class="img-fluid"></a>
               <a href="/images/{{$product->image4}}" class="swipebox"> <img src="/images/{{$product->image4}}" class="img-fluid"></a>
                <a href="/images/{{$product->image5}}" class="swipebox"> <img src="/images/{{$product->image5}}" class="img-fluid"></a> 
                <a href="/images/{{ $product->image6 }}" class="swipebox"><img src="/images/{{$product->image6}}" class="img-fluid"></a>
                <a href="/images/{{ $product->image7 }}" class="swipebox"><img src="/images/{{$product->image7}}" class="img-fluid"></a>
               <a href="/images/{{ $product->image8 }}" class="swipebox"> <img src="/images/{{$product->image8}}" class="img-fluid"></a>
                <a href="/images/{{ $product->image9 }}" class="swipebox"><img src="/images/{{$product->image9}}" class="img-fluid"></a>
                <a href="/images/{{ $product->image10 }}" class="swipebox"><img src="/images/{{$product->image10}}" class="img-fluid"></a>
            
            </div>

          
      </div>
        
      
  </div>





       

    
@endsection

@section('js')
<script type="text/javascript">

    
        $( '.swipebox' ).swipebox({
            hideBarsDelay : 0,
        });
    </script>
    
@endsection
@section('title')
ELLEN RA LINDE Website


@endsection

@extends('layouts.app')

@section('content')

<div class="container">
    
    <div class="row">
        <div class="col-lg-12">
            @if ($message = Session::get('user'))
                <div class="alert alert-success">
                    {{$message}}
                </div>
            @endif
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach( $banners as $banner )
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }} "  data-interval="3000">
                        <img src="/images/{{ $banner->image}}" class="d-block w-100 img-fluid" alt="..." height="600" >
                        
                    </div>
                    @endforeach
                </div>
      
            </div>
               
                  
                </div>
              </div> 
              <div class="row">
                @foreach ($products as $product)
                    <div class="col-sm-3 mt-2">
                        <div class="card" style="width: 18rem;">
                            <a href="/product/{{ $product->id }}"><img src="/images/{{$product->image1}}" class="card-img-top img-fluid one" ></a>
                      
                            <div class="card-body">
                              <h5 class="card-title">{{ $product->product_name}}</h5>
                             
                            </div>
                         
                            
                          </div>
                            
                          </div>
                   
                @endforeach
                
            </div>
        </div>

       



@endsection

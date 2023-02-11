@section('title')
    {{$category->name}}
@endsection
@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row">
        @foreach ($category_products as $product)
            <div class="col-sm-3">
                <div class="card" style="width: 18rem;">
                    <a href="/product/{{$product->id}}"><img src="/images/{{$product->image1}}" class="card-img-top img-fluid" ></a>
                    <div class="card-body">
                      <h5 class="card-title">{{ $product->product_name}}</h5>
                     
                    </div>
                 
                    
                  </div>
                    
                  </div>
           
        @endforeach
    </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="description">
                    
                    <p>{!! nl2br($category->description) !!}</p>
                </div>
            </div>
        </div>
    </div>
@endsection


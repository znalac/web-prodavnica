@section('title')
 Product Edit
@endsection
@extends('admin.master')
@section('content')
 <div class="container">
    <div class="row">
        <div class="form">
           
    <div class="col-sm-10 col-sm-offset-2 ">
        @if ($errors->any())
            
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
            
        @endif
        <form action="/admin/product/{{$product->id}}/edit" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
         <input type="text" name="product_name" class="form-control" placeholder="Product name" value="{{ $product->product_name}}">
          <br>
          <textarea name="product_description" id="" cols="30" rows="10" class="form-control" placeholder="Product description">{{ $product->description }}</textarea>
          
          <input type="text" pattern="^\d*(\.\d{0.2})?$" name="price" class="form-control mt-1" placeholder="Product price" value="{{ $product->price }}">
            <input type="number" name="qty" class="form-control mt-1" placeholder="Quantity" min="1" step="1" value="{{ $product->qty }}" >
          
            
            <label for="image1">Image one</label><br>
            <input type="file" name="image1" class="form-control mt-1" value="{{$product->image1}}">
            <label for="image2">Image two</label><br>
            <input type="file" name="image2" class="form-control mt-1"value="{{$product->image2}}">
            <label for="image3">Image three</label><br>
            <input type="file" name="image3" class="form-control mt-1"value="{{$product->image3}}">
            <label for="image4">Image four</label><br>
            <input type="file" name="image4" class="form-control mt-1"value="{{$product->image4}}">
            <label for="image5">Image five</label><br>
            <input type="file" name="image5" class="form-control mt-1"value="{{$product->image5}}">
            <label for="image6">Image six</label><br>
            <input type="file" name="image6" class="form-control mt-1"value="{{$product->image6}}">
            <label for="image7">Image seven</label><br>
            <input type="file" name="image7" class="form-control mt-1"value="{{$product->image7}}">
            <label for="image8">Image eight</label><br>
            <input type="file" name="image8" class="form-control mt-1" value="{{$product->image8}}">
            <label for="image9">Image nine</label><br>
            <input type="file" name="image9" class="form-control mt-1"value="{{$product->image9}}">
            <label for="image10">Image ten</label><br>
            <input type="file" name="image10" class="form-control mt-1"value="{{$product->image10}}">



           <select name="category" class="form-control mt-1">
            @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ ($product->category_id == $category->id) ? 'Selected' : '' }}>{{ $category->name }}</option> 
         
            @endforeach
        </select>

        <select name="sizes[]" class="form-control mt-1" multiple>
            @foreach ($sizes as $size)
                <option value="{{$size->id}}"@if($product->sizes->contains($size))selected @endif   >{{$size->clothes_size }}</option>
            @endforeach

        </select>
   
          


          <button type="submit" class="btn btn-primary mt-1 save">Save changes</button>
        </form>
   
    </div>

</div>
    </div>
 </div>
@endsection
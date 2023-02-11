@section('title')
    create products
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
        <form action="/admin/create/products" method="post" enctype="multipart/form-data">
            @csrf
         <input type="text" name="product_name" class="form-control" placeholder="Product name" value="{{old('product_name')}}">
          <br>
            <textarea name="product_description" placeholder="Product description" class="form-control" cols="30" rows="10">{{ old('product_description') }}</textarea>
          
          <input type="text"  name="price" class="form-control mt-1" placeholder="Product price format (10.00)" value="{{ old('price') }}">
            <input type="number" name="qty" class="form-control mt-1" placeholder="Quantity" min="1" step="1" value="{{ old('qty') }}" >
            <label for="image1">Image one</label><br>
            <input type="file" name="image1" class="form-control mt-1" >
            <label for="image2">Image two</label><br>
            <input type="file" name="image2" class="form-control mt-1" >
            <label for="image3">Image three</label><br>
            <input type="file" name="image3" class="form-control mt-1" >
            <label for="image4">Image four</label><br>
            <input type="file" name="image4" class="form-control mt-1" >
            <label for="image5">Image five</label><br>
            <input type="file" name="image5" class="form-control mt-1" >
            <label for="image6">Image six</label><br>
            <input type="file" name="image6" class="form-control mt-1" >
            <label for="image7">Image seven</label><br>
            <input type="file" name="image7" class="form-control mt-1" >
            <label for="image8">Image eight</label><br>
            <input type="file" name="image8" class="form-control mt-1" >
            <label for="image9">Image nine</label><br>
            <input type="file" name="image9" class="form-control mt-1" >
            <label for="image10">Image ten</label><br>
            <input type="file" name="image10" class="form-control mt-1" >



           @if ($categories->isNotEmpty())
           <label for="category">Select a category</label><br>
           <select name="category" class="form-control mt-1">
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
   
           @else
               <div class="alert alert-info mt-1">
                   If you want to add a new product, table category musn`t be empty!!!
               </div>
           @endif

           @if ($sizes->isNotEmpty())
           <label for="sizes">This field is required, only when you add some clothes</label><br>
           <select name="sizes[]" class="form-control mt-1" multiple>
            @foreach ($sizes as $size)
                <option value="{{ $size->id }}">{{ $size->clothes_size }}</option>
            @endforeach
        </select>
   
           @else
               <div class="alert alert-info mt-1">
                   If you want to add a new clothes, table sizes musn`t be empty!!!
               </div>
           @endif
          <button type="submit" class="btn btn-primary mt-1 save">Save changes</button>
        </form>
   
    </div>

</div>
    </div>
 </div>
@endsection
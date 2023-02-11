@section('title')
   Edit category
@endsection
@extends('admin.master')
@section('content')
 <div class="container">
    <div class="row">
        <div class="form">
           
    <div class="col-sm-10 col-sm-offset-2 ">
        <form action="/admin/category/{{$category->id}}/edit" method="post">
            @csrf
            @method('put')
         <input type="text" name="category_name" class="form-control" placeholder="category name" value="{{ $category->name}}">
          <br>
          <textarea name="category_description" id="" cols="30" rows="10" class="form-control" placeholder="category description">{{ $category->description }}</textarea>
          <button type="submit" class="btn btn-primary mt-1 save">Save changes</button>
        </form>
        @if ($errors->any())
            
       <div class="alert alert-danger">
           Something wrong!!
       </div>
            
        @endif
    </div>

</div>
    </div>
 </div>
@endsection


@section('title')
    create clothes sizes
@endsection
@extends('admin.master')
@section('content')
 <div class="container">
    <div class="row">
        <div class="form">
           
    <div class="col-sm-10 col-sm-offset-2 ">
        <form action="/admin/create/clothes/sizes" method="post">
            @csrf
         <input type="text" name="clothes_size" class="form-control" placeholder="Clothes size">
          
          <button type="submit" class="btn btn-primary mt-1 save">Save changes</button>
        </form>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
            
        @endif
    </div>

</div>
    </div>
 </div>
@endsection
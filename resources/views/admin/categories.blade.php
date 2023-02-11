@section('title')
    Categories
@endsection
@extends('admin.master')

@section('content')
    <div class="container">
        @can( 'create categories' )
            <a href="/admin/create/category" class="btn btn-primary new-category"> Add category</a>
        @endcan
            @if($categories->isNotEmpty())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th>Category name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                     
                        <td>{!!$category->description!!}</td>

                        
                        
                        <td>
                            
                            <a href="/admin/category/{{$category->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                           
                            <form action="/admin/category/{{$category->id}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>
                    @endforeach
                    </tr>
                </tbody>
            </table>
            @else
                <div class="alert alert-info category">
                    No categories yet!!!
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
@endsection
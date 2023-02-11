@section('title')
   Tatoo gallery
@endsection
@extends('admin.master')

@section('content')
    <div class="container">
       
            <a href="/admin/create/gallery" class="btn btn-primary new-category"> Add image</a>
       
            @if($galleries->isNotEmpty())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>image title</th>
                        <th>image</th>                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($galleries as $gallery)
                    <tr>
                        <td>{{ $gallery->image_title }}</td>
                     
                            <td><img src="/images/{{$gallery->image}}" alt="" class="img-fluid img"></td>

                        
                        
                        <td>
                            
                            <a href="/admin/tatoo/gallery/{{$gallery->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                            <form action="/admin/tatoo/{{$gallery->id}}" method="post" class="d-inline">
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
                    No gallery yet!!!
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
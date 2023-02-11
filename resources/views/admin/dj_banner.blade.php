@section('title')
   Dj banners
@endsection
@extends('admin.master')

@section('content')
    <div class="container">
            <a href="/admin/create/dj" class="btn btn-primary new-category"> Add Dj images</a>
        
            @if($dj_banners->isNotEmpty())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th>Banner images</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dj_banners as $image)
                    <tr>
                        <td style="width:30%;"> <img src="/images/{{$image->image}}" class="img-fluid"> </td>
                     

                        
                        
                        <td>
                            
                            
                            <form action="/admin/dj/{{$image->id}}" method="post" class="d-inline">
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
                    No Dj images yet!!!
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
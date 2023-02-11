@section('title')
   banners
@endsection
@extends('admin.master')

@section('content')
    <div class="container">
        @can( 'create banners' )
            <a href="/admin/create/banner" class="btn btn-primary new-category"> Add banner</a>
        @endcan
            @if($banners->isNotEmpty())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th>Banner images</th>
                        
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($banners as $banner)
                    <tr>
                        <td style="width:30%;"> <img src="/images/{{$banner->image}}" class="img-fluid"> </td>
                     

                        
                        
                        <td>
                            
                            
                            <form action="/admin/banner/{{$banner->id}}" method="post" class="d-inline">
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
                    No banner images yet!!!
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
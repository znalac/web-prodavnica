@section('title')
    Clothes sizes
@endsection
@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
        @can( 'create size' )
            <a href="/admin/create/clothes/sizes" class="btn btn-primary new-category"> Add clothes sizes </a>
        @endcan
            @if($clothes_sizes->isNotEmpty())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th> Clothes Size </th>
                        
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $clothes_sizes as $size)
                    <tr>
                        <td>{{ $size->clothes_size }}</td>
                     
                       

                        <td>
                            
                            <a href="/admin/clothes/size/{{$size->id}}/edit" class="btn btn-primary btn-sm mt-2">Edit</a>
                            <form action="/admin/clothes/size/{{$size->id}}" method="post" class="d-inline">
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
                    No clothes sizes yet!!!
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
    </div>
    </div>
@endsection
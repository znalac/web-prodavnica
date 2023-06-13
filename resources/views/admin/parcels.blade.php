@section('title')
    parcels
@endsection
@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
       
            <a href="/admin/create/parcels" class="btn btn-primary new-category"> Add parcels </a>
      
            @if($parcels->isNotEmpty())
            <table class="table table-bordered">
                <thead>
                    <tr>
                        
                        <th>parcel size</th>
                      
                    
                       
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
               
                   @foreach ($parcels as $parcel)
                       <tr>
                        <td>{{$parcel->p_size}}</td>
                        <td>
                            
                            <a href="/admin/parcel/{{$parcel->id}}/edit" class="btn btn-primary btn-sm mt-2">Edit</a>
                            <form action="/admin/parcel/{{$parcel->id}}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm mt-2" type="submit">Delete</button>
                            </form>
                        </td>
                       </tr>
                   @endforeach
                </tbody>
            </table>
            @else
                <div class="alert alert-info category">
                    No parcel size yet!!!
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

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            
            <div class="col-12">
                
                <a href="{{route('car-park.create')}}" class="btn btn-success">New car park</a>
                <table class="table table-striped">
                
                    <thead>
                        <th>Title</th>
                        <th>Address</th>
                        <th>Schedule</th>
                        <th></th>
                    </thead>
    
                    <tbody>
    
                        @forelse ($carParks as $park)
                            <tr>
                                <td>{{$park->title}}</td>
                                <td>{{$park->address}}</td>
                                <td>{{$park->schedule}}</td>
                                <td>
                                    <form action="{{route('car-park.destroy', $park)}}" 
                                    onsubmit="if(confirm('Вы уверены ?')){return true} else{return false}" method="POST">
                                    
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}

                                        <a href="{{route('car-park.show', $park)}}" class="btn btn-info">Show info</a>
                                        <a href="{{route('car-park.edit', $park->id)}}" class="btn btn-primary">Edit</a>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center"> Empty</td>
                            </tr>
                        @endforelse
    
                    </tbody>
    
                </table>
                
    
            </div>

        </div>
    </div>

    
@endsection
@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            
            <div class="col-12">
                <a href="{{route('car.index')}}" class="btn btn-primary">Back to car list</a>
                <h2>Car number <span class="label label-default">{{$car->number}}</span></h2>
                <hr>
                
                <h3>Car Parks:</h3>
                <table class="table table-striped">
                
                    <thead>
                        <th>Title</th>
                        <th>Address</th>
                        <th>Schedule</th>
                    </thead>
    
                    <tbody>
    
                        @forelse ($car->carParks as $park)
                            <tr>
                                <td>{{$park->title}}</td>
                                <td>{{$park->address}}</td>
                                <td>{{$park->schedule}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">Not tied to any park</td>
                            </tr>
                        @endforelse
    
                    </tbody>
    
                </table>
            </div>


        </div>
    </div>

@endsection
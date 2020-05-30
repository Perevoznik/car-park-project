@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            
            <div class="col-12">
                <a href="{{route('car-park.index')}}" class="btn btn-primary">Back to car park list</a>
                <h2>Car Park "{{$carPark->title}}"</h2>
                <hr>
                
                <h3>Сars of this parking:</h3>
                <table class="table table-striped">
                
                    <thead>
                        <th>Number</th>
                        <th>Driver</th>
                    </thead>
    
                    <tbody>
    
                        @forelse ($carPark->cars as $car)
                            <tr>
                                <td>{{$car->number}}</td>
                                <td>{{$car->driver_name}}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="text-center">No cars</td>
                            </tr>
                        @endforelse
    
                    </tbody>
    
                </table>
            </div>


        </div>
    </div>

@endsection
@extends('layouts.app')

@section('content')
    
<div class="container">
    <div class="row">
        <div class="col-12">
            
            <a href="{{route('car.create')}}" class="btn btn-success">Add new car</a>
            <table class="table table-striped">
            
                <thead>
                    <th>Number</th>
                    <th>Driver</th>
                    <th></th>
                </thead>

                <tbody>

                    @forelse ($cars as $car)
                        <tr>
                            <td>{{$car->number}}</td>
                            <td>{{$car->driver_name}}</td>
                            <td>
                                <a href="{{route('car.edit', $car->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('car.show', $car->id)}}" class="btn btn-info">Show more</a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center"> Empty</td>
                        </tr>
                    @endforelse

                </tbody>

            </table>
            

        </div>
    </div>
</div>

@endsection
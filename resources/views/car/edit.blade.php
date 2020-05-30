@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col">
                <form class="form-horizontal" action="{{route('car.update', $car)}}" method="POST">
    
                    {{ csrf_field() }}
            
                    <input type="hidden" name="_method" value="PUT">
                    @include('car.partials.form')
                    
                    <div class="col-12">
                        <hr>
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
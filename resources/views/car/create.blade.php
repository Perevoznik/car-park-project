@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col">
                <form class="form-horizontal" action="{{route('car.store')}}" method="POST">
    
                    {{ csrf_field() }}
            
                    @include('car.partials.form')
                    
                    <div class="col-12">
                        <hr>
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
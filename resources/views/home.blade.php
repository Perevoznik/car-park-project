@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading p-5">Dashboard</div>

                    <a href="{{route('car-park.index')}}" class="btn btn-primary">Car parks</a>
                    <a href="{{route('car.index')}}" class="btn btn-primary">Cars</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h3>Edit "{{$carPark->title}}"</h3>

                <form action="{{route('car-park.update', $carPark)}}" class="form-horizontal" method="POST">
    
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <input type="hidden" name="id" value="{{$carPark->id}}">
                    
                    @include('park.partials.form')
                    <hr>
                    <div class="col-sm-12" style="margin: 15px">
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <script src="{{ asset('js/park-form.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/my-styles.css')}}">
@endsection

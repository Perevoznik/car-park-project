
@foreach ($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
@endforeach

<div class="form-group">
    <label class="col-sm-2 control-label">Car number</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="number"
        value="{{$car->number or old('number')}}" placeholder="AA 1234 AI" >
    </div>
</div>

<div class="form-group">
    <label class="col-sm-2 control-label">Driver name</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" name="driver_name"
        value="{{$car->driver_name or old('driver_name')}}" placeholder="Name" >
    </div>
</div>

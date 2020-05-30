
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">{{$error}}</div>
    @endforeach

    <div class="form-group">
        <label class="col-sm-2 control-label">Title</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="title" required
            value="{{$carPark->title or old('title')}}" placeholder="Title" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Address</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="address"
            value="{{$carPark->address or old('address')}}" placeholder="Address" required>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Schedule</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" name="schedule"
            value="{{$carPark->schedule or old('schedule')}}" placeholder="Schedule">
        </div>
    </div>

    <h3>Cars</h3>
    <hr>
    <button type="button" id="btnAddCar" title="Add car" class="btn btn-primary">+ Add car</button>
    
    <div id="car-info">
        @if(old('cars') !== null)
            @foreach (old('cars') as $index => $car)
                <div index="{{$index}}" class="col-md-3 car-card">
                        
                    <p><button type="button" class="btn btn-sm btn-danger" data-index="{{$index}}" onclick="removeCar(event)">Remove</button></p>
                    <label>Number: </label>
                    <input type="text" value="{{$car['number']}}" class="form-control" name="cars[{{$index}}][number]" required>
                    <label>Driver name: </label>
                    <input type="text" value="{{$car['driver_name']}}" class="form-control" name="cars[{{$index}}][driver_name]" required>

                </div>
            @endforeach

            <input type="hidden" name="last_index" value="{{count(old('cars'))}}">
        @endif
    </div>

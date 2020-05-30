
let blockCarsId = '#car-info';
let carIndex;
window.onload = function(){

    let parkId = $('input[name="id"]').val();
    carIndex = $(`${blockCarsId} input[name="last_index"]`).val() || 0;

    $('#btnAddCar').on('click', () => {

        this.insertCar({number: "", driver_name: ""}, carIndex);
    });
    
    if(parkId){
        this.getCarsFromPark(parkId);
    }
}

function getCarsFromPark(parkId){

    $.ajax({
        url: `/api/get-cars/${parkId}`,
        method: "GET",
        dataType: "JSON",
        success: function(cars){

            for (let i = 0; i < cars.length; i++) {

                insertCar(cars[i], i);
            }
        },
    });
}

function removeCar(event){
 
    let index = event.target.dataset.index;
    $(`div[index="${index}"]`).remove();
}

function insertCar(car, index){

    $(blockCarsId).append(`
    
        <div index="${index}" class="col-md-3 car-card">
                
            <p><button type="button" class="btn btn-sm btn-danger" data-index="${index}" onclick="removeCar(event)">Remove</button></p>
            <label>Number: </label>
            <input type="text" value="${car.number}" class="form-control" name="cars[${index}][number]" required>
            <label>Driver name: </label>
            <input type="text" value="${car.driver_name}" class="form-control" name="cars[${index}][driver_name]" required>

        </div>
    
    `);
    carIndex++;
}

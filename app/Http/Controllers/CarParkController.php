<?php

namespace App\Http\Controllers;

use App\CarPark;
use App\Car;
use Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarParkController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('park.index', [
            'carParks' => CarPark::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('park.create', [
            'carPark' => [],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, $this->rules(), $this->validationMessages());

        $carPark = CarPark::create($request->all());

        if($request->input('cars')){
            $cars = $this->carProcessing($request->input('cars'));
            $carPark->cars()->attach($cars);
        }

        return redirect()->route('car-park.index');
    }

    private function carProcessing($carsArr){

        $dbCars = Car::all();
        $carArrToPark = array();

        foreach ($carsArr as $car) {
            
            $car['user_id'] = Auth::id();
            $dbCar = Car::where('number', $car['number'])->first();

            if(!$dbCar){

                $id = Car::create($car)->id;
                array_push($carArrToPark, Car::find($id)->id);
            }
            else{
                array_push($carArrToPark, $dbCar->id);
            }
        }

        return $carArrToPark;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CarPark  $carPark
     * @return \Illuminate\Http\Response
     */
    public function show(CarPark $carPark)
    {
        return view('park.info', [
            'carPark' => $carPark
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarPark  $carPark
     * @return \Illuminate\Http\Response
     */
    public function edit(CarPark $carPark)
    {
        return view('park.edit', [
            'carPark' => $carPark,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarPark  $carPark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarPark $carPark)
    {
        // ЗДЕСЬ НУЖНО В НОМЕРЕ ВСЕХ МАШИН УБРАТЬ ВСЕ ПРОБЕЛЫ!!!
        $request->validate($this->rules());

        $requestCars = $request->input('cars');
        $carPark->cars()->detach();

        if($requestCars){
            $carPark->cars()->attach($this->carProcessing($requestCars));
        }

        $carPark->update($request->all());
        return redirect()->route('car-park.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarPark  $carPark
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarPark $carPark)
    {
        $carPark->cars()->detach();
        $carPark->delete();

        return redirect()->route('car-park.index');
    }

    public function getCars($parkId){

        $park = CarPark::find($parkId);
        return response()->json($park->cars);
    }

    private function rules(){
        return [
            'title' => "required|string",
            'address' => "required|string",
            'cars.*.number' => "required|string",
            'cars.*.driver_name' => "required|string",
        ];
    }

    private function validationMessages(){

        return [
            'cars.*.required' => "Car fields cannot be empty"
        ];
    }
}

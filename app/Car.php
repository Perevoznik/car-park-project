<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['number', 'driver_name', 'user_id', 'created_at', 'updated_at'];

    public function carParks(){

        return $this->belongsToMany('App\CarPark', 'car_car_park', 'car_id', 'car_park_id');
    }

    public function user(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}

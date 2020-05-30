<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarPark extends Model
{
    protected $fillable = ['title', 'address', 'schedule', 'created_at', 'updated_at'];

    public function cars(){

        return $this->belongsToMany('App\Car', 'car_car_park', 'car_park_id', 'car_id');
    }
}

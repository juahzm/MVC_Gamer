<?php

namespace App\Models;
use App\Models\CRUD;

class Manufacturer extends CRUD {
    protected $table='Manufacturer';
    protected $primarykey='ManufacturerId';
    protected $fillable = ['manufacturer'];

}
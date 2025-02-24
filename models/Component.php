<?php

namespace App\Models;
use App\Models\CRUD;

class Component extends CRUD {
    protected $table='Component';
    protected $primarykey='componentId';
    protected $fillable = ['componentName','componentDescription', 'componentGuarantee', 'componentPrice', 'Manufacturer_idManufacturer'];//ici vont toutes les colones je suis interesse a declarer de plus

}


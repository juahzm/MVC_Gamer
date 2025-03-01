<?php

namespace App\Models;
use App\Models\CRUD;

class Component extends CRUD {
    protected $table='Component';
    protected $primaryKey='componentId';
    protected $fillable = ['componentName','componentDescription', 'componentGuarantee', 'componentPrice', 'Manufacturer_idManufacturer'];//ici vont toutes les colones je suis interesse a declarer de plus
    protected $externalKey = 'Manufacturer_idManufacturer';
}


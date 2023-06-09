<?php

declare(strict_types=1);

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Bike extends Vehicle
{
    protected $fillable = [
        'machine',
        'suspension_type',
        'transmission_type',
        'vehicle_id'
    ];
}

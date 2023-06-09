<?php

declare(strict_types=1);

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Car extends Vehicle
{
    protected $fillable = [
        'machine',
        'passenger_capacity',
        'type',
        'vehicle_id'
    ];
}

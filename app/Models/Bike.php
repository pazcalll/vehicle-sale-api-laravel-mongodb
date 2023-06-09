<?php

declare(strict_types=1);

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\BelongsTo;
use Jenssegers\Mongodb\Relations\MorphMany;

class Bike extends Vehicle
{
    protected $fillable = [
        'machine',
        'suspension_type',
        'transmission_type',
        'vehicle_id'
    ];

    // RELATIONS
    function vehicle() : BelongsTo {
        return $this->belongsTo(Vehicle::class);
    }

    function stocks() : MorphMany {
        return $this->morphMany(Stock::class, 'stockable');
    }
}

<?php

declare(strict_types=1);

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\BelongsTo;
use Jenssegers\Mongodb\Relations\MorphMany;

class Car extends Vehicle
{
    protected $fillable = [
        'machine',
        'passenger_capacity',
        'type',
        'vehicle_id'
    ];

    // RELATIONS
    public function vehicle() : BelongsTo {
        return $this->belongsTo(Vehicle::class);
    }

    public function stockable() : MorphMany {
        return $this->morphMany(Stock::class, 'stockable');
    }
}

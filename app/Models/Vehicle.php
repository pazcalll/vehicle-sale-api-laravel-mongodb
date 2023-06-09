<?php

declare(strict_types=1);

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = [
        'release_year',
        'color',
        'price'
    ];
}

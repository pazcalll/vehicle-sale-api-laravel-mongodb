<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\MorphTo;

class Stock extends Model
{
    protected $fillable = ['stockable_type', 'stockable_id', 'amount'];

    public const TYPE_STOCK_ADD = 'ADD';
    public const TYPE_STOCK_SUBTRACT = 'SUBTRACT';

    // RELATIONS
    function stockable() : MorphTo {
        return $this->morphTo();
    }
}

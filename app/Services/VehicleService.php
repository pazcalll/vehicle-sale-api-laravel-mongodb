<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Stock;

class VehicleService {
    public static function stockMapper(array $paginatedData) {
        return array_map(function ($item) {
            $item['total_stock'] = Stock::where('stockable_id', $item['_id'])->sum('amount');
            return $item;
        }, $paginatedData['data']);
    }
}
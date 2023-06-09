<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Stock;

class StockService {
    public static function storeStock(array $validatedData) : object {
        $validatedData['amount'] = intval($validatedData['amount']);
        $stock = Stock::create($validatedData);

        return (object) $stock;
    }

    public static function sellCarRule() : array {
        return request()->validate([
            'stockable_id' => ['required', 'exists:cars,_id'],
            'amount' => ['required', 'integer']
        ]);
    }

    public static function sellBikeRule() : array {
        return request()->validate([
            'stockable_id' => ['required', 'exists:bikes,_id'],
            'amount' => ['required', 'integer']
        ]);
    }

    public static function sell($class, $validatedData) : object {
        $validatedData['stockable_type'] = $class;
        $validatedData['amount'] = (-$validatedData['amount']);
        return Stock::create($validatedData);
    }
}
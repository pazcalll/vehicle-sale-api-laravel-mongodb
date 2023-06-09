<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Stock;
use App\Models\Vehicle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CarController extends Controller
{
    //
    function index() : JsonResponse {
        $data = Car::withSum('stocks', 'amount');
        return respondWithData($data);
    }

    function store(): JsonResponse {
        $validatedData = request()->validate([
            'release_year' => ['required', 'max:4'],
            'color' => ['required', 'max:16'],
            'price' => ['required', 'numeric'],

            'machine' => ['required'],
            'passenger_capacity' => ['required'],
            'type' => ['required']
        ]);

        $validatedData['price'] = intval($validatedData['price']);
        $vehicle = Vehicle::create($validatedData);

        $validatedData['vehicle_id'] = $vehicle->id;
        $car = Car::create($validatedData);

        return respondWithData(data: $car, message: 'Car data stored');
    }
}

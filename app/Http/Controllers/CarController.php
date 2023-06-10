<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Stock;
use App\Models\Vehicle;
use App\Services\VehicleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    //
    function index() : JsonResponse {
        $data = Car::where('user_id', Auth::user()->id)
            ->paginate()
            ->toArray();

        $data['data'] = VehicleService::stockMapper($data);

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

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['vehicle_id'] = $vehicle->id;
        $car = Car::create($validatedData);

        return respondWithData(data: $car, message: 'Car data stored');
    }

    public function show(Car $car) : JsonResponse {
        $car->total_stock = Stock::where('stockable_id', $car->_id)->sum('amount');

        return respondWithData($car);
    }
}

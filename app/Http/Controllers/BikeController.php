<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Stock;
use App\Models\Vehicle;
use App\Services\VehicleService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BikeController extends Controller
{
    //
    function index() : JsonResponse {
        $data = Bike::where('user_id', Auth::user()->id)
            ->paginate()
            ->toArray();

        $data['data'] = VehicleService::stockMapper($data);

        return respondWithData($data);
    }

    function store() : JsonResponse {
        $validatedData = request()->validate([
            'release_year' => ['required', 'max:4'],
            'color' => ['required', 'max:16'],
            'price' => ['required', 'numeric'],

            'machine' => ['required'],
            'suspension_type' => ['required'],
            'transmission_type' => ['required']
        ]);

        $validatedData['price'] = intval($validatedData['price']);
        $vehicle = Vehicle::create($validatedData);

        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['vehicle_id'] = $vehicle->id;
        $bike = Bike::create($validatedData);

        return respondWithData(data: $bike, message: 'Bike data stored');
    }

    public function show(Bike $bike) : JsonResponse {
        $bike->total_stock = Stock::where('stockable_type', Bike::class)
            ->where('stockable_id', $bike->_id)
            ->where('user_id', Auth::user()->id)
            ->sum('amount');

        return respondWithData($bike);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Bike;
use App\Models\Car;
use App\Models\Stock;
use App\Services\StockService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeCar() : JsonResponse {
        $validatedData = StockService::sellCarRule();
        $validatedData['stockable_type'] = Car::class;
        $stock = StockService::storeStock($validatedData);

        return respondWithData($stock, 'Car stock has been added');
    }

    public function storeBike() : JsonResponse {
        $validatedData = StockService::sellBikeRule();
        $validatedData['stockable_type'] = Bike::class;
        $stock = StockService::storeStock($validatedData);

        return respondWithData($stock, 'Bike stock has been added');
    }

    public function sellCar() : JsonResponse {
        $validatedData = StockService::sellCarRule();
        $carStock = Stock::where('stockable_id', $validatedData['stockable_id'])
            ->sum('amount');

        if ($carStock - $validatedData['amount'] <= 0) return respondWithMessage('Insufficient car amount');

        $stock = StockService::sell(Car::class, $validatedData);

        return respondWithData($stock);
    }

    public function sellBike() : JsonResponse {
        $validatedData = StockService::sellBikeRule();
        $bikeStock = Stock::where('stockable_id', $validatedData['stockable_id'])
            ->sum('amount');

        if ($bikeStock - $validatedData['amount'] <= 0) return respondWithMessage('Insufficient bike amount');

        $stock = StockService::sell(Bike::class, $validatedData);

        return respondWithData($stock);
    }
}

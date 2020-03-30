<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCarDealerRequest;
use App\Http\Requests\UpdateCarDealerRequest;
use App\Models\CarDealer;
use Illuminate\Http\Request;

class CarDealersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carDealers = CarDealer::with( 'city' )->get();

        return $this->sendResponse( $carDealers, 'Data retrieved.' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCarDealerRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( StoreCarDealerRequest $request )
    {
        $carDealer = CarDealer::create( $request->all() );

        return $this->sendResponse( $carDealer, 'Data stored.' );
    }

    /**
     * Display the specified resource.
     *
     * @param  CarDealer  $carDealer
     * @return \Illuminate\Http\JsonResponse
     */
    public function show( CarDealer $carDealer )
    {
        $carDealer->city;
        return $this->sendResponse( $carDealer, 'Data retrieved.' );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCarDealerRequest  $request
     * @param  CarDealer  $carDealer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( UpdateCarDealerRequest $request, CarDealer $carDealer )
    {
        $carDealer->fill( $request->all() );
        $carDealer->save();

        return $this->sendResponse( $carDealer, 'Data updated.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy( CarDealer $carDealer )
    {
        $carDealer->delete();

        return $this->sendResponse( null, 'Data deleted.' );
    }
}

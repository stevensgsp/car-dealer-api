<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Models\CarDealer;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $customers = Customer::with( 'carDealer' )->get();

        return $this->sendResponse( $customers, 'Data retrieved.' );
    }
    /**
     * Display a listing of the resource by carDealer.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexByCarDealer( CarDealer $carDealer )
    {
        $customers = $carDealer->customers()->with( 'carDealer' )->get();

        return $this->sendResponse( $customers, 'Data retrieved.' );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCustomerRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store( StoreCustomerRequest $request )
    {
        $customer = Customer::create( $request->all() );

        return $this->sendResponse( $customer, 'Data stored.' );
    }

    /**
     * Display the specified resource.
     *
     * @param  Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function show( Customer $customer )
    {
        $customer->carDealer;

        return $this->sendResponse( $customer, 'Data retrieved.' );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCustomerRequest  $request
     * @param  Customer  $customer
     * @return \Illuminate\Http\JsonResponse
     */
    public function update( UpdateCustomerRequest $request, Customer $customer )
    {
        $customer->fill( $request->all() );
        $customer->save();

        return $this->sendResponse( $customer, 'Data updated.' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy( Customer $customer )
    {
        $customer->delete();

        return $this->sendResponse( null, 'Data deleted.' );
    }
}

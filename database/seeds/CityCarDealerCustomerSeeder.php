<?php

use Illuminate\Database\Seeder;

class CityCarDealerCustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = factory( App\Models\City::class, 3 )->create();

        $carDealers = factory( App\Models\CarDealer::class, 15 )->make()->each( function ( $carDealer ) use ( $cities ) {
            $carDealer->city_id = $cities[ array_rand( $cities->toArray() ) ]->id;
            $carDealer->save();

            factory( App\Models\Customer::class, 2 )->make()->each( function ( $customer ) use ( $carDealer ) {
                $customer->car_dealer_id = $carDealer->id;
                $customer->save();
            } );
        } );
    }
}

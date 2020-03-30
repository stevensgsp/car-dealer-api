<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarDealersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'car_dealers', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );

            // cities reference
            $table->unsignedBigInteger( 'city_id' );
            $table->foreign( 'city_id' )->references( 'id' )->on( 'cities' )
                ->onDelete( 'restrict' )->onUpdate( 'restrict' );

            $table->string( 'name' );
            $table->mediumText( 'description' );
            $table->string( 'location' );

            $table->timestamps();
            $table->softDeletes();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'car_dealers' );
    }
}

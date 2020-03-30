<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'customers', function ( Blueprint $table ) {
            $table->bigIncrements( 'id' );

            // car_dealers reference
            $table->unsignedBigInteger( 'car_dealer_id' );
            $table->foreign( 'car_dealer_id' )->references( 'id' )->on( 'car_dealers' )
                ->onDelete( 'restrict' )->onUpdate( 'restrict' );

            $table->string( 'name' );
            $table->string( 'lastname' );
            $table->string( 'dni' );
            $table->string( 'email' )->unique();
            $table->string( 'address' )->nullable()->default( null );

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
        Schema::dropIfExists( 'customers' );
    }
}

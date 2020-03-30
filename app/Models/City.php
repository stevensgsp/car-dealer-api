<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use SoftDeletes;

    public $table = 'cities';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = [ 'deleted_at' ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'created_at', 'deleted_at'
    ];

    /**
     * The default rules that the model will validate against.
     *
     * @var array
     */
    protected $rules = [];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function carDealers()
    {
        return $this->hasMany( \App\Models\CarDealer::class );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     **/
    public function customers()
    {
        return $this->hasManyThrough( \App\Models\Customer::class, \App\Models\CarDealer::class );
    }
}

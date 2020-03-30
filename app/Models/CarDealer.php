<?php

namespace App\Models;

use App\Traits\HasPhones;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarDealer extends Model
{
    use HasPhones, SoftDeletes;

    public $table = 'car_dealers';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $dates = [ 'deleted_at' ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'location',
        'city_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'updated_at', 'created_at', 'deleted_at'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => [ 'required', 'string', 'filled', 'max:50' ],
        'description' => [ 'required', 'string', 'filled', 'max:200' ],
        'location' => [ 'required', 'string', 'filled', 'max:200' ],
        'city_id' => [ 'required', 'exists:cities,id' ],
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function city()
    {
        return $this->belongsTo( \App\Models\City::class );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function customers()
    {
        return $this->hasMany( \App\Models\Customer::class );
    }
}

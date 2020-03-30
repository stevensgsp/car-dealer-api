<?php

namespace App\Models;

use App\Traits\HasPhones;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasPhones, SoftDeletes;

    public $table = 'customers';

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
        'lastname',
        'dni',
        'email',
        'address',
        'car_dealer_id',
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
        'name' => [ 'required', 'string', 'filled', 'max:20' ],
        'lastname' => [ 'required', 'string', 'filled', 'max:20' ],
        'dni' => [ 'required', 'alpha_num', 'filled', 'max:20' ],
        'email' => [ 'required', 'email', 'filled', 'max:50' ],
        'address' => [ 'required', 'string', 'filled', 'max:200' ],
        'car_dealer_id' => [ 'required', 'exists:car_dealers,id' ],
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function carDealer()
    {
        return $this->belongsTo( \App\Models\CarDealer::class );
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOneThrough
     **/
    public function city()
    {
        return $this->hasOneThrough( \App\Models\City::class, \App\Models\CarDealer::class );
    }
}

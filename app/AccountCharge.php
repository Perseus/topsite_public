<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AccountCharge
 * @package App\Models
 * @version October 18, 2016, 4:18 am UTC
 */
class AccountCharge extends Model
{
    use SoftDeletes;

    public $table = 'account_charge';
    protected $connection = 'AccountServer';
    public $fillable = [
        'charge_flag',
        'charge_begin_tick',
        'charge_end_tick',
        'saves'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'charge_flag' => 'integer',
        'charge_begin_tick' => 'integer',
        'charge_end_tick' => 'integer',
        'saves' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

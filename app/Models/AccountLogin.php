<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class AccountLogin
 * @package App\Models
 * @version October 18, 2016, 4:25 am UTC
 */
class AccountLogin extends Authenticatable
{
    use SoftDeletes;

    public $table = 'account_login';
    protected $connection = 'AccountServer';
    public $timestamps = false;

    public $fillable = [
        'name',
        'password',
        'originalPassword',
        'sid',
        'login_status',
        'enable_login_tick',
        'login_group',
        'last_login_time',
        'last_logout_time',
        'last_login_ip',
        'enable_login_time',
        'total_live_time',
        'last_login_mac',
        'ban',
        'email',
        'squestion',
        'answer',
        'register_ip',
        'refered_by',
        'last_ip_detected',
        'refer_points',
        'vip'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'password' => 'string',
        'originalPassword' => 'string',
        'sid' => 'integer',
        'login_status' => 'integer',
        'login_group' => 'string',
        'last_login_ip' => 'string',
        'last_login_mac' => 'string',
        'email' => 'string',
        'squestion' => 'string',
        'answer' => 'string',
        'register_ip' => 'string',
        'refered_by' => 'integer',
        'last_ip_detected' => 'string',
        'refer_points' => 'integer',
        'vip' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

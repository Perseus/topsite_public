<?php

namespace App;

use Eloquent as Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * Class Account
 * @package App\Models
 * @version October 18, 2016, 4:29 am UTC
 */
class Account extends Authenticatable
{

    public $table = 'account';
    protected $connection = 'GameDB';
    public $timestamps = false;
    public $primaryKey = 'act_id';


    public $fillable = [
        'act_id',
        'act_name',
        'gm',
        'cha_ids',
        'last_ip',
        'disc_reason',
        'last_leave',
        'password',
        'merge_state',
        'mall_points',
        'credits',
        'vote_time',
        'vote_time1',
        'vote_time2',
        'total_votes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'act_id' => 'integer',
        'act_name' => 'string',
        'cha_ids' => 'string',
        'last_ip' => 'string',
        'disc_reason' => 'string',
        'password' => 'string',
        'merge_state' => 'integer',
        'mall_points' => 'integer',
        'credits' => 'integer',
        'vote_time' => 'string',
        'vote_time1' => 'string',
        'vote_time2' => 'string',
        'total_votes' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function characters()
    {
        return $this->hasMany(\App\Character::class);
    }
}

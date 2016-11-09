<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Guild
 * @package App\Models
 * @version October 18, 2016, 4:30 am UTC
 */
class Guild extends Model
{

    public $table = 'guild';
    protected $connection = 'GameDB';
    public $timestamps = false;


    public $fillable = [
        'guild_name',
        'motto',
        'passwd',
        'leader_id',
        'type',
        'stat',
        'money',
        'exp',
        'member_total',
        'try_total',
        'disband_date',
        'challlevel',
        'challid',
        'challmoney',
        'challstart'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'guild_id' => 'integer',
        'guild_name' => 'string',
        'motto' => 'string',
        'passwd' => 'string',
        'leader_id' => 'integer',
        'challid' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

     /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function character()
    {
        return $this->belongsTo(\App\Character::class);
    }

    /**
     * @return \App\Character\
     */
    public function getleaderidAttribute($value)
    {
        return Character::where('cha_id',$value)->first()->cha_name;

    }
    
}

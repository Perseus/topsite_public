<?php

namespace App;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class StatLog
 * @package App\Models
 * @version October 18, 2016, 4:31 am UTC
 */
class StatLog extends Model
{

    public $table = 'stat_log';
    protected $connection = 'GameDB';


    public $fillable = [
        'login_num',
        'play_num',
        'wgplay_num'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'login_num' => 'integer',
        'play_num' => 'integer',
        'wgplay_num' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}

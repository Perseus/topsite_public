<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Character
 * @package App\Models
 * @version October 18, 2016, 4:29 am UTC
 */
class Character extends Model
{
    use SoftDeletes;

    public $table = 'character';
    protected $connection = 'GameDB';


    public $fillable = [
        'cha_name',
        'motto',
        'icon',
        'version',
        'pk_ctrl',
        'mem_addr',
        'act_id',
        'guild_id',
        'guild_stat',
        'guild_permission',
        'job',
        'degree',
        'exp',
        'hp',
        'sp',
        'ap',
        'tp',
        'gd',
        'str',
        'dex',
        'agi',
        'con',
        'sta',
        'luk',
        'sail_lv',
        'sail_exp',
        'sail_left_exp',
        'live_lv',
        'live_exp',
        'map',
        'map_x',
        'map_y',
        'radius',
        'angle',
        'look',
        'kb_capacity',
        'kitbag',
        'skillbag',
        'shortcut',
        'mission',
        'misrecord',
        'mistrigger',
        'miscount',
        'birth',
        'login_cha',
        'live_tp',
        'map_mask',
        'delflag',
        'operdate',
        'deldate',
        'main_map',
        'skill_state',
        'bank',
        'estop',
        'estoptime',
        'kb_locked',
        'kitbag_tmp',
        'credit',
        'store_item',
        'extend'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'cha_id' => 'integer',
        'cha_name' => 'string',
        'motto' => 'string',
        'mem_addr' => 'integer',
        'act_id' => 'integer',
        'guild_id' => 'integer',
        'job' => 'string',
        'hp' => 'integer',
        'sp' => 'integer',
        'ap' => 'integer',
        'tp' => 'integer',
        'gd' => 'integer',
        'str' => 'integer',
        'dex' => 'integer',
        'agi' => 'integer',
        'con' => 'integer',
        'sta' => 'integer',
        'luk' => 'integer',
        'sail_lv' => 'integer',
        'sail_exp' => 'integer',
        'sail_left_exp' => 'integer',
        'live_lv' => 'integer',
        'live_exp' => 'integer',
        'map' => 'string',
        'map_x' => 'integer',
        'map_y' => 'integer',
        'radius' => 'integer',
        'angle' => 'integer',
        'look' => 'string',
        'kb_capacity' => 'integer',
        'kitbag' => 'string',
        'skillbag' => 'string',
        'shortcut' => 'string',
        'mission' => 'string',
        'misrecord' => 'string',
        'mistrigger' => 'string',
        'miscount' => 'string',
        'birth' => 'string',
        'login_cha' => 'string',
        'live_tp' => 'integer',
        'map_mask' => 'string',
        'main_map' => 'string',
        'skill_state' => 'string',
        'bank' => 'string',
        'estoptime' => 'integer',
        'kb_locked' => 'integer',
        'kitbag_tmp' => 'integer',
        'credit' => 'integer',
        'store_item' => 'integer',
        'extend' => 'string'
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
    public function account()
    {
        return $this->belongsTo(\App\Models\Account::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function items()
    {
        return $this->hasMany(\App\Models\Item::class);
    }
}

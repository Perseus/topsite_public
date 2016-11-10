<?php

namespace App;

use Eloquent as Model;
use Config;
use App\Guild;

/**
 * Class Character
 * @package App\Models
 * @version October 18, 2016, 4:29 am UTC
 */
class Character extends Model
{

    public $table = 'character';
    protected $connection = 'GameDB';
    protected $primaryKey = 'cha_id';
    protected $appends = array('chartype','guildname');

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
        return $this->belongsTo(\App\Account::class,'act_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function items()
    {
        return $this->hasMany(\App\Item::class);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */

    public function guild()
    {
        return $this->hasOne(\App\Guild::class);
    }

    /**
     * @return JobName
     * checks whether the job exists in the job database. 
     * if not, just return as is, otherwise return the corresponding job
     */

    public function getJobAttribute($value)
    {
        if(Config::has('job.'.$value))
        {
            return Config::get('job.'.$value);
        }
        else
            return $value;
    }

    /**
     * @return string charType
     * checks the look column, gets char type value and then returns the character type in string
     */

    public function getchartypeAttribute()
    {
        $lookColumn = $this->look;
        $lookColumn = explode(',',$lookColumn)[0];
        $lookColumn = explode('#',$lookColumn)[1];
        if(Config::has('chartype.'.$lookColumn))
        {
            return Config::get('chartype.'.$lookColumn);
        }
        else
        return $lookColumn;
    }
    /**
     * @return string Guild name
     *  checks the guild id column, looks for a guild with that name, and returns it
     */

    public function getguildnameAttribute()
    {
        $guildColumn = $this->guild_id;
        $guild = Guild::where('guild_id',$guildColumn)->first();
        if($guild->guild_name == "Navy HQ")
            return 'N/A';
        else
          return $guild->guild_name;
    }



}

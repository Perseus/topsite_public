<?php

namespace App\Repositories;

use App\Models\Character;
use InfyOm\Generator\Common\BaseRepository;

class CharacterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Character::class;
    }
}

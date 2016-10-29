<?php

namespace App\Repositories;

use App\Models\Guild;
use InfyOm\Generator\Common\BaseRepository;

class GuildRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Guild::class;
    }
}

<?php

namespace App\Repositories;

use App\Models\StatLog;
use InfyOm\Generator\Common\BaseRepository;

class StatLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'login_num',
        'play_num',
        'wgplay_num'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StatLog::class;
    }
}

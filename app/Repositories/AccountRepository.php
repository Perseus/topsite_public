<?php

namespace App\Repositories;

use App\Models\Account;
use InfyOm\Generator\Common\BaseRepository;

class AccountRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Account::class;
    }
}

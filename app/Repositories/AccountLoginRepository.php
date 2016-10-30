<?php

namespace App\Repositories;

use App\AccountLogin;
use InfyOm\Generator\Common\BaseRepository;

class AccountLoginRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return AccountLogin::class;
    }
}

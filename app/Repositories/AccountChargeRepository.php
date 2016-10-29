<?php

namespace App\Repositories;

use App\Models\AccountCharge;
use InfyOm\Generator\Common\BaseRepository;

class AccountChargeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'charge_flag',
        'charge_begin_tick',
        'charge_end_tick',
        'saves'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return AccountCharge::class;
    }
}

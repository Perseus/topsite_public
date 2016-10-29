<?php

namespace App\Repositories;

use App\Models\Resource;
use InfyOm\Generator\Common\BaseRepository;

class ResourceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cha_id',
        'type_id',
        'content'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Resource::class;
    }
}

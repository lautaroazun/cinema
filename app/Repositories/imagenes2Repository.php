<?php

namespace App\Repositories;

use App\Models\imagenes2;
use InfyOm\Generator\Common\BaseRepository;

class imagenes2Repository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return imagenes2::class;
    }
}

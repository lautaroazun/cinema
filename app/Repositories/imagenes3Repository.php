<?php

namespace Cinema\Repositories;

use Cinema\Models\imagenes3;
use InfyOm\Generator\Common\BaseRepository;

class imagenes3Repository extends BaseRepository
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
        return imagenes3::class;
    }
}

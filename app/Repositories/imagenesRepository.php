<?php

namespace App\Repositories;

use App\Models\imagenes;
use InfyOm\Generator\Common\BaseRepository;

class imagenesRepository extends BaseRepository
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
        return imagenes::class;
    }
}

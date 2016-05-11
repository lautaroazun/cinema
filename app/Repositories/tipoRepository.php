<?php

namespace Cinema\Repositories;

use Cinema\Models\tipo;
use InfyOm\Generator\Common\BaseRepository;

class tipoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tipo::class;
    }
}

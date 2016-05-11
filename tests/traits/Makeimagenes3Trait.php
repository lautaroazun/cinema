<?php

use Faker\Factory as Faker;
use App\Models\imagenes3;
use App\Repositories\imagenes3Repository;

trait Makeimagenes3Trait
{
    /**
     * Create fake instance of imagenes3 and save it in database
     *
     * @param array $imagenes3Fields
     * @return imagenes3
     */
    public function makeimagenes3($imagenes3Fields = [])
    {
        /** @var imagenes3Repository $imagenes3Repo */
        $imagenes3Repo = App::make(imagenes3Repository::class);
        $theme = $this->fakeimagenes3Data($imagenes3Fields);
        return $imagenes3Repo->create($theme);
    }

    /**
     * Get fake instance of imagenes3
     *
     * @param array $imagenes3Fields
     * @return imagenes3
     */
    public function fakeimagenes3($imagenes3Fields = [])
    {
        return new imagenes3($this->fakeimagenes3Data($imagenes3Fields));
    }

    /**
     * Get fake data of imagenes3
     *
     * @param array $postFields
     * @return array
     */
    public function fakeimagenes3Data($imagenes3Fields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id' => $fake->word,
            'nombre' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $imagenes3Fields);
    }
}

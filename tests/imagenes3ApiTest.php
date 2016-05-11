<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class imagenes3ApiTest extends TestCase
{
    use Makeimagenes3Trait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateimagenes3()
    {
        $imagenes3 = $this->fakeimagenes3Data();
        $this->json('POST', '/api/v1/imagenes3s', $imagenes3);

        $this->assertApiResponse($imagenes3);
    }

    /**
     * @test
     */
    public function testReadimagenes3()
    {
        $imagenes3 = $this->makeimagenes3();
        $this->json('GET', '/api/v1/imagenes3s/'.$imagenes3->id);

        $this->assertApiResponse($imagenes3->toArray());
    }

    /**
     * @test
     */
    public function testUpdateimagenes3()
    {
        $imagenes3 = $this->makeimagenes3();
        $editedimagenes3 = $this->fakeimagenes3Data();

        $this->json('PUT', '/api/v1/imagenes3s/'.$imagenes3->id, $editedimagenes3);

        $this->assertApiResponse($editedimagenes3);
    }

    /**
     * @test
     */
    public function testDeleteimagenes3()
    {
        $imagenes3 = $this->makeimagenes3();
        $this->json('DELETE', '/api/v1/imagenes3s/'.$imagenes3->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/imagenes3s/'.$imagenes3->id);

        $this->assertResponseStatus(404);
    }
}

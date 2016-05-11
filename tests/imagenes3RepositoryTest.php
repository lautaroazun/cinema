<?php

use App\Models\imagenes3;
use App\Repositories\imagenes3Repository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class imagenes3RepositoryTest extends TestCase
{
    use Makeimagenes3Trait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var imagenes3Repository
     */
    protected $imagenes3Repo;

    public function setUp()
    {
        parent::setUp();
        $this->imagenes3Repo = App::make(imagenes3Repository::class);
    }

    /**
     * @test create
     */
    public function testCreateimagenes3()
    {
        $imagenes3 = $this->fakeimagenes3Data();
        $createdimagenes3 = $this->imagenes3Repo->create($imagenes3);
        $createdimagenes3 = $createdimagenes3->toArray();
        $this->assertArrayHasKey('id', $createdimagenes3);
        $this->assertNotNull($createdimagenes3['id'], 'Created imagenes3 must have id specified');
        $this->assertNotNull(imagenes3::find($createdimagenes3['id']), 'imagenes3 with given id must be in DB');
        $this->assertModelData($imagenes3, $createdimagenes3);
    }

    /**
     * @test read
     */
    public function testReadimagenes3()
    {
        $imagenes3 = $this->makeimagenes3();
        $dbimagenes3 = $this->imagenes3Repo->find($imagenes3->id);
        $dbimagenes3 = $dbimagenes3->toArray();
        $this->assertModelData($imagenes3->toArray(), $dbimagenes3);
    }

    /**
     * @test update
     */
    public function testUpdateimagenes3()
    {
        $imagenes3 = $this->makeimagenes3();
        $fakeimagenes3 = $this->fakeimagenes3Data();
        $updatedimagenes3 = $this->imagenes3Repo->update($fakeimagenes3, $imagenes3->id);
        $this->assertModelData($fakeimagenes3, $updatedimagenes3->toArray());
        $dbimagenes3 = $this->imagenes3Repo->find($imagenes3->id);
        $this->assertModelData($fakeimagenes3, $dbimagenes3->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteimagenes3()
    {
        $imagenes3 = $this->makeimagenes3();
        $resp = $this->imagenes3Repo->delete($imagenes3->id);
        $this->assertTrue($resp);
        $this->assertNull(imagenes3::find($imagenes3->id), 'imagenes3 should not exist in DB');
    }
}

<?php namespace Tests\Repositories;

use App\Models\Receita;
use App\Repositories\ReceitaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\Traits\MakeReceitaTrait;
use Tests\ApiTestTrait;

class ReceitaRepositoryTest extends TestCase
{
    use MakeReceitaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ReceitaRepository
     */
    protected $receitaRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->receitaRepo = \App::make(ReceitaRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_receita()
    {
        $receita = $this->fakeReceitaData();
        $createdReceita = $this->receitaRepo->create($receita);
        $createdReceita = $createdReceita->toArray();
        $this->assertArrayHasKey('id', $createdReceita);
        $this->assertNotNull($createdReceita['id'], 'Created Receita must have id specified');
        $this->assertNotNull(Receita::find($createdReceita['id']), 'Receita with given id must be in DB');
        $this->assertModelData($receita, $createdReceita);
    }

    /**
     * @test read
     */
    public function test_read_receita()
    {
        $receita = $this->makeReceita();
        $dbReceita = $this->receitaRepo->find($receita->id);
        $dbReceita = $dbReceita->toArray();
        $this->assertModelData($receita->toArray(), $dbReceita);
    }

    /**
     * @test update
     */
    public function test_update_receita()
    {
        $receita = $this->makeReceita();
        $fakeReceita = $this->fakeReceitaData();
        $updatedReceita = $this->receitaRepo->update($fakeReceita, $receita->id);
        $this->assertModelData($fakeReceita, $updatedReceita->toArray());
        $dbReceita = $this->receitaRepo->find($receita->id);
        $this->assertModelData($fakeReceita, $dbReceita->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_receita()
    {
        $receita = $this->makeReceita();
        $resp = $this->receitaRepo->delete($receita->id);
        $this->assertTrue($resp);
        $this->assertNull(Receita::find($receita->id), 'Receita should not exist in DB');
    }
}

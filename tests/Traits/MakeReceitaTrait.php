<?php namespace Tests\Traits;

use Faker\Factory as Faker;
use App\Models\Receita;
use App\Repositories\ReceitaRepository;

trait MakeReceitaTrait
{
    /**
     * Create fake instance of Receita and save it in database
     *
     * @param array $receitaFields
     * @return Receita
     */
    public function makeReceita($receitaFields = [])
    {
        /** @var ReceitaRepository $receitaRepo */
        $receitaRepo = \App::make(ReceitaRepository::class);
        $theme = $this->fakeReceitaData($receitaFields);
        return $receitaRepo->create($theme);
    }

    /**
     * Get fake instance of Receita
     *
     * @param array $receitaFields
     * @return Receita
     */
    public function fakeReceita($receitaFields = [])
    {
        return new Receita($this->fakeReceitaData($receitaFields));
    }

    /**
     * Get fake data of Receita
     *
     * @param array $receitaFields
     * @return array
     */
    public function fakeReceitaData($receitaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'procedure' => $fake->word,
            'publisher_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s')
        ], $receitaFields);
    }
}

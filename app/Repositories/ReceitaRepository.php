<?php

namespace App\Repositories;

use App\Models\Receita;
use App\Repositories\BaseRepository;

/**
 * Class ReceitaRepository
 * @package App\Repositories
 * @version May 22, 2019, 4:39 pm UTC
*/

class ReceitaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'procedure',
        'publisher_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    
    
    /**
     * Configure the Model
     **/
    public function model()
    {
        return Receita::class;
    }
}

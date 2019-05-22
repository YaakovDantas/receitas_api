<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateReceitaAPIRequest;
use App\Http\Requests\API\UpdateReceitaAPIRequest;
use App\Models\Receita;
use App\Repositories\ReceitaRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ReceitaController
 * @package App\Http\Controllers\API
 */

class ReceitaAPIController extends AppBaseController
{
    /** @var  ReceitaRepository */
    private $receitaRepository;

    public function __construct(ReceitaRepository $receitaRepo)
    {
        $this->receitaRepository = $receitaRepo;
    }

    /**
     * Display a listing of the Receita.
     * GET|HEAD /receitas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {   
        unset($request['publisher_id']); //remover usuario logado, retorna todos linhas do bd, sem filtrar por usuario
        $receitas = $this->receitaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($receitas->toArray(), 'Receitas retrieved successfully');
    }

    public function listUser(Request $request)
    {      
       
        $receitas = $this->receitaRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($receitas->toArray(), 'Receitas retrieved successfully');
    }

    /**
     * Store a newly created Receita in storage.
     * POST /receitas
     *
     * @param CreateReceitaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateReceitaAPIRequest $request)
    {
        $input = $request->all();

        $receita = $this->receitaRepository->create($input);

        return $this->sendResponse($receita->toArray(), 'Receita saved successfully');
    }

    /**
     * Display the specified Receita.
     * GET|HEAD /receitas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Receita $receita */
        $receita = $this->receitaRepository->find($id);

        if (empty($receita)) {
            return $this->sendError('Receita not found');
        }

        return $this->sendResponse($receita->toArray(), 'Receita retrieved successfully');
    }

    /**
     * Update the specified Receita in storage.
     * PUT/PATCH /receitas/{id}
     *
     * @param int $id
     * @param UpdateReceitaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReceitaAPIRequest $request)
    {
        $user_logado_id = $request['publisher_id'];
        
        $input = $request->all();
        
        /** @var Receita $receita */
        $receita = $this->receitaRepository->find($id);

        if (empty($receita)) {
            return $this->sendError('Receita not found');
        }
        
        if($receita->publisher_id != $user_logado_id){
            return $this->sendError('You cant update receitas from another user');   
        }

        $receita = $this->receitaRepository->update($input, $id);

        return $this->sendResponse($receita->toArray(), 'Receita updated successfully');
    }

    /**
     * Remove the specified Receita from storage.
     * DELETE /receitas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Receita $receita */
        $receita = $this->receitaRepository->find($id);

        if (empty($receita)) {
            return $this->sendError('Receita not found');
        }

        $receita->delete();

        return $this->sendResponse($id, 'Receita deleted successfully');
    }
}

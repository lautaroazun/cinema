<?php

namespace Cinema\Http\Controllers;

use Cinema\Http\Http\Requests;
use Cinema\Http\Requests\CreatetipoRequest;
use Cinema\Http\Requests\UpdatetipoRequest;
use Cinema\Repositories\tipoRepository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class tipoController extends AppBaseController
{
    /** @var  tipoRepository */
    private $tipoRepository;

    public function __construct(tipoRepository $tipoRepo)
    {
        $this->tipoRepository = $tipoRepo;
    }

    /**
     * Display a listing of the tipo.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tipoRepository->pushCriteria(new RequestCriteria($request));
        $tipos = $this->tipoRepository->all();

        return view('tipos.index')
            ->with('tipos', $tipos);
    }

    /**
     * Show the form for creating a new tipo.
     *
     * @return Response
     */
    public function create()
    {
        return view('tipos.create');
    }

    /**
     * Store a newly created tipo in storage.
     *
     * @param CreatetipoRequest $request
     *
     * @return Response
     */
    public function store(CreatetipoRequest $request)
    {
        $input = $request->all();

        $tipo = $this->tipoRepository->create($input);

        Flash::success('tipo saved successfully.');

        return redirect(route('tipos.index'));
    }

    /**
     * Display the specified tipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tipo = $this->tipoRepository->findWithoutFail($id);

        if (empty($tipo)) {
            Flash::error('tipo not found');

            return redirect(route('tipos.index'));
        }

        return view('tipos.show')->with('tipo', $tipo);
    }

    /**
     * Show the form for editing the specified tipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tipo = $this->tipoRepository->findWithoutFail($id);

        if (empty($tipo)) {
            Flash::error('tipo not found');

            return redirect(route('tipos.index'));
        }

        return view('tipos.edit')->with('tipo', $tipo);
    }

    /**
     * Update the specified tipo in storage.
     *
     * @param  int              $id
     * @param UpdatetipoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatetipoRequest $request)
    {
        $tipo = $this->tipoRepository->findWithoutFail($id);

        if (empty($tipo)) {
            Flash::error('tipo not found');

            return redirect(route('tipos.index'));
        }

        $tipo = $this->tipoRepository->update($request->all(), $id);

        Flash::success('tipo updated successfully.');

        return redirect(route('tipos.index'));
    }

    /**
     * Remove the specified tipo from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tipo = $this->tipoRepository->findWithoutFail($id);

        if (empty($tipo)) {
            Flash::error('tipo not found');

            return redirect(route('tipos.index'));
        }

        $this->tipoRepository->delete($id);

        Flash::success('tipo deleted successfully.');

        return redirect(route('tipos.index'));
    }
}

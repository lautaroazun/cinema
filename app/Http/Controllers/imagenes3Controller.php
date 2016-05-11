<?php

namespace Cinema\Http\Controllers;

use Cinema\Http\Requests;
use Cinema\Http\Requests\Createimagenes3Request;
use Cinema\Http\Requests\Updateimagenes3Request;
use Cinema\Repositories\imagenes3Repository;
use Illuminate\Http\Request;
use Flash;
use InfyOm\Generator\Controller\AppBaseController;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class imagenes3Controller extends AppBaseController
{
    /** @var  imagenes3Repository */
    private $imagenes3Repository;

    public function __construct(imagenes3Repository $imagenes3Repo)
    {
        $this->imagenes3Repository = $imagenes3Repo;
    }

    /**
     * Display a listing of the imagenes3.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->imagenes3Repository->pushCriteria(new RequestCriteria($request));
        $imagenes3s = $this->imagenes3Repository->all();

        return view('imagenes3s.index')
            ->with('imagenes3s', $imagenes3s);
    }

    /**
     * Show the form for creating a new imagenes3.
     *
     * @return Response
     */
    public function create()
    {
        return view('imagenes3s.create');
    }

    /**
     * Store a newly created imagenes3 in storage.
     *
     * @param Createimagenes3Request $request
     *
     * @return Response
     */
    public function store(Createimagenes3Request $request)
    {
        $input = $request->all();

        $imagenes3 = $this->imagenes3Repository->create($input);

        Flash::success('imagenes3 saved successfully.');

        return redirect(route('imagenes3s.index'));
    }

    /**
     * Display the specified imagenes3.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $imagenes3 = $this->imagenes3Repository->findWithoutFail($id);

        if (empty($imagenes3)) {
            Flash::error('imagenes3 not found');

            return redirect(route('imagenes3s.index'));
        }

        return view('imagenes3s.show')->with('imagenes3', $imagenes3);
    }

    /**
     * Show the form for editing the specified imagenes3.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $imagenes3 = $this->imagenes3Repository->findWithoutFail($id);

        if (empty($imagenes3)) {
            Flash::error('imagenes3 not found');

            return redirect(route('imagenes3s.index'));
        }

        return view('imagenes3s.edit')->with('imagenes3', $imagenes3);
    }

    /**
     * Update the specified imagenes3 in storage.
     *
     * @param  int              $id
     * @param Updateimagenes3Request $request
     *
     * @return Response
     */
    public function update($id, Updateimagenes3Request $request)
    {
        $imagenes3 = $this->imagenes3Repository->findWithoutFail($id);

        if (empty($imagenes3)) {
            Flash::error('imagenes3 not found');

            return redirect(route('imagenes3s.index'));
        }

        $imagenes3 = $this->imagenes3Repository->update($request->all(), $id);

        Flash::success('imagenes3 updated successfully.');

        return redirect(route('imagenes3s.index'));
    }

    /**
     * Remove the specified imagenes3 from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $imagenes3 = $this->imagenes3Repository->findWithoutFail($id);

        if (empty($imagenes3)) {
            Flash::error('imagenes3 not found');

            return redirect(route('imagenes3s.index'));
        }

        $this->imagenes3Repository->delete($id);

        Flash::success('imagenes3 deleted successfully.');

        return redirect(route('imagenes3s.index'));
    }
}

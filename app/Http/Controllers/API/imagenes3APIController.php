Cinema<?php

namespace Cinema\Http\Controllers\API;

use Cinema\Http\Requests\API\Createimagenes3APIRequest;
use Cinema\Http\Requests\API\Updateimagenes3APIRequest;
use Cinema\Models\imagenes3;
use Cinema\Repositories\imagenes3Repository;
use Illuminate\Http\Request;
use InfyOm\Generator\Controller\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class imagenes3Controller
 * @package App\Http\Controllers\API
 */

class imagenes3APIController extends AppBaseController
{
    /** @var  imagenes3Repository */
    private $imagenes3Repository;

    public function __construct(imagenes3Repository $imagenes3Repo)
    {
        $this->imagenes3Repository = $imagenes3Repo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/imagenes3s",
     *      summary="Get a listing of the imagenes3s.",
     *      tags={"imagenes3"},
     *      description="Get all imagenes3s",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/imagenes3")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->imagenes3Repository->pushCriteria(new RequestCriteria($request));
        $this->imagenes3Repository->pushCriteria(new LimitOffsetCriteria($request));
        $imagenes3s = $this->imagenes3Repository->all();

        return $this->sendResponse($imagenes3s->toArray(), 'imagenes3s retrieved successfully');
    }

    /**
     * @param Createimagenes3APIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/imagenes3s",
     *      summary="Store a newly created imagenes3 in storage",
     *      tags={"imagenes3"},
     *      description="Store imagenes3",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="imagenes3 that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/imagenes3")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/imagenes3"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createimagenes3APIRequest $request)
    {
        $input = $request->all();

        $imagenes3s = $this->imagenes3Repository->create($input);

        return $this->sendResponse($imagenes3s->toArray(), 'imagenes3 saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/imagenes3s/{id}",
     *      summary="Display the specified imagenes3",
     *      tags={"imagenes3"},
     *      description="Get imagenes3",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of imagenes3",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/imagenes3"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var imagenes3 $imagenes3 */
        $imagenes3 = $this->imagenes3Repository->find($id);

        if (empty($imagenes3)) {
            return Response::json(ResponseUtil::makeError('imagenes3 not found'), 400);
        }

        return $this->sendResponse($imagenes3->toArray(), 'imagenes3 retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateimagenes3APIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/imagenes3s/{id}",
     *      summary="Update the specified imagenes3 in storage",
     *      tags={"imagenes3"},
     *      description="Update imagenes3",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of imagenes3",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="imagenes3 that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/imagenes3")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/imagenes3"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateimagenes3APIRequest $request)
    {
        $input = $request->all();

        /** @var imagenes3 $imagenes3 */
        $imagenes3 = $this->imagenes3Repository->find($id);

        if (empty($imagenes3)) {
            return Response::json(ResponseUtil::makeError('imagenes3 not found'), 400);
        }

        $imagenes3 = $this->imagenes3Repository->update($input, $id);

        return $this->sendResponse($imagenes3->toArray(), 'imagenes3 updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/imagenes3s/{id}",
     *      summary="Remove the specified imagenes3 from storage",
     *      tags={"imagenes3"},
     *      description="Delete imagenes3",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of imagenes3",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var imagenes3 $imagenes3 */
        $imagenes3 = $this->imagenes3Repository->find($id);

        if (empty($imagenes3)) {
            return Response::json(ResponseUtil::makeError('imagenes3 not found'), 400);
        }

        $imagenes3->delete();

        return $this->sendResponse($id, 'imagenes3 deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createimagenes2APIRequest;
use App\Http\Requests\API\Updateimagenes2APIRequest;
use App\Models\imagenes2;
use App\Repositories\imagenes2Repository;
use Illuminate\Http\Request;
use InfyOm\Generator\Controller\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class imagenes2Controller
 * @package App\Http\Controllers\API
 */

class imagenes2APIController extends AppBaseController
{
    /** @var  imagenes2Repository */
    private $imagenes2Repository;

    public function __construct(imagenes2Repository $imagenes2Repo)
    {
        $this->imagenes2Repository = $imagenes2Repo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/imagenes2s",
     *      summary="Get a listing of the imagenes2s.",
     *      tags={"imagenes2"},
     *      description="Get all imagenes2s",
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
     *                  @SWG\Items(ref="#/definitions/imagenes2")
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
        $this->imagenes2Repository->pushCriteria(new RequestCriteria($request));
        $this->imagenes2Repository->pushCriteria(new LimitOffsetCriteria($request));
        $imagenes2s = $this->imagenes2Repository->all();

        return $this->sendResponse($imagenes2s->toArray(), 'imagenes2s retrieved successfully');
    }

    /**
     * @param Createimagenes2APIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/imagenes2s",
     *      summary="Store a newly created imagenes2 in storage",
     *      tags={"imagenes2"},
     *      description="Store imagenes2",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="imagenes2 that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/imagenes2")
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
     *                  ref="#/definitions/imagenes2"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(Createimagenes2APIRequest $request)
    {
        $input = $request->all();

        $imagenes2s = $this->imagenes2Repository->create($input);

        return $this->sendResponse($imagenes2s->toArray(), 'imagenes2 saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/imagenes2s/{id}",
     *      summary="Display the specified imagenes2",
     *      tags={"imagenes2"},
     *      description="Get imagenes2",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of imagenes2",
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
     *                  ref="#/definitions/imagenes2"
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
        /** @var imagenes2 $imagenes2 */
        $imagenes2 = $this->imagenes2Repository->find($id);

        if (empty($imagenes2)) {
            return Response::json(ResponseUtil::makeError('imagenes2 not found'), 400);
        }

        return $this->sendResponse($imagenes2->toArray(), 'imagenes2 retrieved successfully');
    }

    /**
     * @param int $id
     * @param Updateimagenes2APIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/imagenes2s/{id}",
     *      summary="Update the specified imagenes2 in storage",
     *      tags={"imagenes2"},
     *      description="Update imagenes2",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of imagenes2",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="imagenes2 that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/imagenes2")
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
     *                  ref="#/definitions/imagenes2"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, Updateimagenes2APIRequest $request)
    {
        $input = $request->all();

        /** @var imagenes2 $imagenes2 */
        $imagenes2 = $this->imagenes2Repository->find($id);

        if (empty($imagenes2)) {
            return Response::json(ResponseUtil::makeError('imagenes2 not found'), 400);
        }

        $imagenes2 = $this->imagenes2Repository->update($input, $id);

        return $this->sendResponse($imagenes2->toArray(), 'imagenes2 updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/imagenes2s/{id}",
     *      summary="Remove the specified imagenes2 from storage",
     *      tags={"imagenes2"},
     *      description="Delete imagenes2",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of imagenes2",
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
        /** @var imagenes2 $imagenes2 */
        $imagenes2 = $this->imagenes2Repository->find($id);

        if (empty($imagenes2)) {
            return Response::json(ResponseUtil::makeError('imagenes2 not found'), 400);
        }

        $imagenes2->delete();

        return $this->sendResponse($id, 'imagenes2 deleted successfully');
    }
}

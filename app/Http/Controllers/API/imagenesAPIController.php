<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateimagenesAPIRequest;
use App\Http\Requests\API\UpdateimagenesAPIRequest;
use App\Models\imagenes;
use App\Repositories\imagenesRepository;
use Illuminate\Http\Request;
use InfyOm\Generator\Controller\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use InfyOm\Generator\Utils\ResponseUtil;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class imagenesController
 * @package App\Http\Controllers\API
 */

class imagenesAPIController extends AppBaseController
{
    /** @var  imagenesRepository */
    private $imagenesRepository;

    public function __construct(imagenesRepository $imagenesRepo)
    {
        $this->imagenesRepository = $imagenesRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/imagenes",
     *      summary="Get a listing of the imagenes.",
     *      tags={"imagenes"},
     *      description="Get all imagenes",
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
     *                  @SWG\Items(ref="#/definitions/imagenes")
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
        $this->imagenesRepository->pushCriteria(new RequestCriteria($request));
        $this->imagenesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $imagenes = $this->imagenesRepository->all();

        return $this->sendResponse($imagenes->toArray(), 'imagenes retrieved successfully');
    }

    /**
     * @param CreateimagenesAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/imagenes",
     *      summary="Store a newly created imagenes in storage",
     *      tags={"imagenes"},
     *      description="Store imagenes",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="imagenes that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/imagenes")
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
     *                  ref="#/definitions/imagenes"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateimagenesAPIRequest $request)
    {
        $input = $request->all();

        $imagenes = $this->imagenesRepository->create($input);

        return $this->sendResponse($imagenes->toArray(), 'imagenes saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/imagenes/{id}",
     *      summary="Display the specified imagenes",
     *      tags={"imagenes"},
     *      description="Get imagenes",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of imagenes",
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
     *                  ref="#/definitions/imagenes"
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
        /** @var imagenes $imagenes */
        $imagenes = $this->imagenesRepository->find($id);

        if (empty($imagenes)) {
            return Response::json(ResponseUtil::makeError('imagenes not found'), 400);
        }

        return $this->sendResponse($imagenes->toArray(), 'imagenes retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateimagenesAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/imagenes/{id}",
     *      summary="Update the specified imagenes in storage",
     *      tags={"imagenes"},
     *      description="Update imagenes",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of imagenes",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="imagenes that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/imagenes")
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
     *                  ref="#/definitions/imagenes"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateimagenesAPIRequest $request)
    {
        $input = $request->all();

        /** @var imagenes $imagenes */
        $imagenes = $this->imagenesRepository->find($id);

        if (empty($imagenes)) {
            return Response::json(ResponseUtil::makeError('imagenes not found'), 400);
        }

        $imagenes = $this->imagenesRepository->update($input, $id);

        return $this->sendResponse($imagenes->toArray(), 'imagenes updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/imagenes/{id}",
     *      summary="Remove the specified imagenes from storage",
     *      tags={"imagenes"},
     *      description="Delete imagenes",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of imagenes",
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
        /** @var imagenes $imagenes */
        $imagenes = $this->imagenesRepository->find($id);

        if (empty($imagenes)) {
            return Response::json(ResponseUtil::makeError('imagenes not found'), 400);
        }

        $imagenes->delete();

        return $this->sendResponse($id, 'imagenes deleted successfully');
    }
}

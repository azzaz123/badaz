<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateRoutesAPIRequest;
use App\Http\Requests\Device\BulkUpdateRoutesAPIRequest;
use App\Http\Requests\Device\CreateRoutesAPIRequest;
use App\Http\Requests\Device\UpdateRoutesAPIRequest;
use App\Http\Resources\Device\RoutesCollection;
use App\Http\Resources\Device\RoutesResource;
use App\Repositories\RoutesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class RoutesController extends AppBaseController
{
    /**
     * @var RoutesRepository
     */
    private RoutesRepository $routesRepository;

    /**
     * @param RoutesRepository $routesRepository
     */
    public function __construct(RoutesRepository $routesRepository)
    {
        $this->routesRepository = $routesRepository;
    }

    /**
     * Routes's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return RoutesCollection
     */
    public function index(Request $request): RoutesCollection
    {
        $routes = $this->routesRepository->fetch($request);

        return new RoutesCollection($routes);
    }

    /**
     * Create Routes with given payload.
     *
     * @param CreateRoutesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return RoutesResource
     */
    public function store(CreateRoutesAPIRequest $request): RoutesResource
    {
        $input = $request->all();
        $routes = $this->routesRepository->create($input);

        return new RoutesResource($routes);
    }

    /**
     * Get single Routes record.
     *
     * @param int $id
     *
     * @return RoutesResource
     */
    public function show(int $id): RoutesResource
    {
        $routes = $this->routesRepository->findOrFail($id);

        return new RoutesResource($routes);
    }

    /**
     * Update Routes with given payload.
     *
     * @param UpdateRoutesAPIRequest $request
     * @param int                    $id
     *
     * @throws ValidatorException
     *
     * @return RoutesResource
     */
    public function update(UpdateRoutesAPIRequest $request, int $id): RoutesResource
    {
        $input = $request->all();
        $routes = $this->routesRepository->update($input, $id);

        return new RoutesResource($routes);
    }

    /**
     * Delete given Routes.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->routesRepository->delete($id);

        return $this->successResponse('Routes deleted successfully.');
    }

    /**
     * Bulk create Routes's.
     *
     * @param BulkCreateRoutesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return RoutesCollection
     */
    public function bulkStore(BulkCreateRoutesAPIRequest $request): RoutesCollection
    {
        $routes = collect();

        $input = $request->get('data');
        foreach ($input as $key => $routesInput) {
            $routes[$key] = $this->routesRepository->create($routesInput);
        }

        return new RoutesCollection($routes);
    }

    /**
     * Bulk update Routes's data.
     *
     * @param BulkUpdateRoutesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return RoutesCollection
     */
    public function bulkUpdate(BulkUpdateRoutesAPIRequest $request): RoutesCollection
    {
        $routes = collect();

        $input = $request->get('data');
        foreach ($input as $key => $routesInput) {
            $routes[$key] = $this->routesRepository->update($routesInput, $routesInput['id']);
        }

        return new RoutesCollection($routes);
    }
}

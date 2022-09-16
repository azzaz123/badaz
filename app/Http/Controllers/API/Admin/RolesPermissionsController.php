<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateRolesPermissionsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateRolesPermissionsAPIRequest;
use App\Http\Requests\Admin\CreateRolesPermissionsAPIRequest;
use App\Http\Requests\Admin\UpdateRolesPermissionsAPIRequest;
use App\Http\Resources\Admin\RolesPermissionsCollection;
use App\Http\Resources\Admin\RolesPermissionsResource;
use App\Repositories\RolesPermissionsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class RolesPermissionsController extends AppBaseController
{
    /**
     * @var RolesPermissionsRepository
     */
    private RolesPermissionsRepository $rolesPermissionsRepository;

    /**
     * @param RolesPermissionsRepository $rolesPermissionsRepository
     */
    public function __construct(RolesPermissionsRepository $rolesPermissionsRepository)
    {
        $this->rolesPermissionsRepository = $rolesPermissionsRepository;
    }

    /**
     * RolesPermissions's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return RolesPermissionsCollection
     */
    public function index(Request $request): RolesPermissionsCollection
    {
        $rolesPermissions = $this->rolesPermissionsRepository->fetch($request);

        return new RolesPermissionsCollection($rolesPermissions);
    }

    /**
     * Create RolesPermissions with given payload.
     *
     * @param CreateRolesPermissionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return RolesPermissionsResource
     */
    public function store(CreateRolesPermissionsAPIRequest $request): RolesPermissionsResource
    {
        $input = $request->all();
        $rolesPermissions = $this->rolesPermissionsRepository->create($input);

        return new RolesPermissionsResource($rolesPermissions);
    }

    /**
     * Get single RolesPermissions record.
     *
     * @param int $id
     *
     * @return RolesPermissionsResource
     */
    public function show(int $id): RolesPermissionsResource
    {
        $rolesPermissions = $this->rolesPermissionsRepository->findOrFail($id);

        return new RolesPermissionsResource($rolesPermissions);
    }

    /**
     * Update RolesPermissions with given payload.
     *
     * @param UpdateRolesPermissionsAPIRequest $request
     * @param int                              $id
     *
     * @throws ValidatorException
     *
     * @return RolesPermissionsResource
     */
    public function update(UpdateRolesPermissionsAPIRequest $request, int $id): RolesPermissionsResource
    {
        $input = $request->all();
        $rolesPermissions = $this->rolesPermissionsRepository->update($input, $id);

        return new RolesPermissionsResource($rolesPermissions);
    }

    /**
     * Delete given RolesPermissions.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->rolesPermissionsRepository->delete($id);

        return $this->successResponse('RolesPermissions deleted successfully.');
    }

    /**
     * Bulk create RolesPermissions's.
     *
     * @param BulkCreateRolesPermissionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return RolesPermissionsCollection
     */
    public function bulkStore(BulkCreateRolesPermissionsAPIRequest $request): RolesPermissionsCollection
    {
        $rolesPermissions = collect();

        $input = $request->get('data');
        foreach ($input as $key => $rolesPermissionsInput) {
            $rolesPermissions[$key] = $this->rolesPermissionsRepository->create($rolesPermissionsInput);
        }

        return new RolesPermissionsCollection($rolesPermissions);
    }

    /**
     * Bulk update RolesPermissions's data.
     *
     * @param BulkUpdateRolesPermissionsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return RolesPermissionsCollection
     */
    public function bulkUpdate(BulkUpdateRolesPermissionsAPIRequest $request): RolesPermissionsCollection
    {
        $rolesPermissions = collect();

        $input = $request->get('data');
        foreach ($input as $key => $rolesPermissionsInput) {
            $rolesPermissions[$key] = $this->rolesPermissionsRepository->update($rolesPermissionsInput, $rolesPermissionsInput['id']);
        }

        return new RolesPermissionsCollection($rolesPermissions);
    }
}

<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateImagesFileManagerAPIRequest;
use App\Http\Requests\Device\BulkUpdateImagesFileManagerAPIRequest;
use App\Http\Requests\Device\CreateImagesFileManagerAPIRequest;
use App\Http\Requests\Device\UpdateImagesFileManagerAPIRequest;
use App\Http\Resources\Device\ImagesFileManagerCollection;
use App\Http\Resources\Device\ImagesFileManagerResource;
use App\Repositories\ImagesFileManagerRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ImagesFileManagerController extends AppBaseController
{
    /**
     * @var ImagesFileManagerRepository
     */
    private ImagesFileManagerRepository $imagesFileManagerRepository;

    /**
     * @param ImagesFileManagerRepository $imagesFileManagerRepository
     */
    public function __construct(ImagesFileManagerRepository $imagesFileManagerRepository)
    {
        $this->imagesFileManagerRepository = $imagesFileManagerRepository;
    }

    /**
     * ImagesFileManager's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ImagesFileManagerCollection
     */
    public function index(Request $request): ImagesFileManagerCollection
    {
        $imagesFileManagers = $this->imagesFileManagerRepository->fetch($request);

        return new ImagesFileManagerCollection($imagesFileManagers);
    }

    /**
     * Create ImagesFileManager with given payload.
     *
     * @param CreateImagesFileManagerAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ImagesFileManagerResource
     */
    public function store(CreateImagesFileManagerAPIRequest $request): ImagesFileManagerResource
    {
        $input = $request->all();
        $imagesFileManager = $this->imagesFileManagerRepository->create($input);

        return new ImagesFileManagerResource($imagesFileManager);
    }

    /**
     * Get single ImagesFileManager record.
     *
     * @param int $id
     *
     * @return ImagesFileManagerResource
     */
    public function show(int $id): ImagesFileManagerResource
    {
        $imagesFileManager = $this->imagesFileManagerRepository->findOrFail($id);

        return new ImagesFileManagerResource($imagesFileManager);
    }

    /**
     * Update ImagesFileManager with given payload.
     *
     * @param UpdateImagesFileManagerAPIRequest $request
     * @param int                               $id
     *
     * @throws ValidatorException
     *
     * @return ImagesFileManagerResource
     */
    public function update(UpdateImagesFileManagerAPIRequest $request, int $id): ImagesFileManagerResource
    {
        $input = $request->all();
        $imagesFileManager = $this->imagesFileManagerRepository->update($input, $id);

        return new ImagesFileManagerResource($imagesFileManager);
    }

    /**
     * Delete given ImagesFileManager.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->imagesFileManagerRepository->delete($id);

        return $this->successResponse('ImagesFileManager deleted successfully.');
    }

    /**
     * Bulk create ImagesFileManager's.
     *
     * @param BulkCreateImagesFileManagerAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ImagesFileManagerCollection
     */
    public function bulkStore(BulkCreateImagesFileManagerAPIRequest $request): ImagesFileManagerCollection
    {
        $imagesFileManagers = collect();

        $input = $request->get('data');
        foreach ($input as $key => $imagesFileManagerInput) {
            $imagesFileManagers[$key] = $this->imagesFileManagerRepository->create($imagesFileManagerInput);
        }

        return new ImagesFileManagerCollection($imagesFileManagers);
    }

    /**
     * Bulk update ImagesFileManager's data.
     *
     * @param BulkUpdateImagesFileManagerAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ImagesFileManagerCollection
     */
    public function bulkUpdate(BulkUpdateImagesFileManagerAPIRequest $request): ImagesFileManagerCollection
    {
        $imagesFileManagers = collect();

        $input = $request->get('data');
        foreach ($input as $key => $imagesFileManagerInput) {
            $imagesFileManagers[$key] = $this->imagesFileManagerRepository->update($imagesFileManagerInput, $imagesFileManagerInput['id']);
        }

        return new ImagesFileManagerCollection($imagesFileManagers);
    }
}

<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateImagesAPIRequest;
use App\Http\Requests\Admin\BulkUpdateImagesAPIRequest;
use App\Http\Requests\Admin\CreateImagesAPIRequest;
use App\Http\Requests\Admin\UpdateImagesAPIRequest;
use App\Http\Resources\Admin\ImagesCollection;
use App\Http\Resources\Admin\ImagesResource;
use App\Repositories\ImagesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ImagesController extends AppBaseController
{
    /**
     * @var ImagesRepository
     */
    private ImagesRepository $imagesRepository;

    /**
     * @param ImagesRepository $imagesRepository
     */
    public function __construct(ImagesRepository $imagesRepository)
    {
        $this->imagesRepository = $imagesRepository;
    }

    /**
     * Images's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ImagesCollection
     */
    public function index(Request $request): ImagesCollection
    {
        $images = $this->imagesRepository->fetch($request);

        return new ImagesCollection($images);
    }

    /**
     * Create Images with given payload.
     *
     * @param CreateImagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ImagesResource
     */
    public function store(CreateImagesAPIRequest $request): ImagesResource
    {
        $input = $request->all();
        $images = $this->imagesRepository->create($input);

        return new ImagesResource($images);
    }

    /**
     * Get single Images record.
     *
     * @param int $id
     *
     * @return ImagesResource
     */
    public function show(int $id): ImagesResource
    {
        $images = $this->imagesRepository->findOrFail($id);

        return new ImagesResource($images);
    }

    /**
     * Update Images with given payload.
     *
     * @param UpdateImagesAPIRequest $request
     * @param int                    $id
     *
     * @throws ValidatorException
     *
     * @return ImagesResource
     */
    public function update(UpdateImagesAPIRequest $request, int $id): ImagesResource
    {
        $input = $request->all();
        $images = $this->imagesRepository->update($input, $id);

        return new ImagesResource($images);
    }

    /**
     * Delete given Images.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->imagesRepository->delete($id);

        return $this->successResponse('Images deleted successfully.');
    }

    /**
     * Bulk create Images's.
     *
     * @param BulkCreateImagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ImagesCollection
     */
    public function bulkStore(BulkCreateImagesAPIRequest $request): ImagesCollection
    {
        $images = collect();

        $input = $request->get('data');
        foreach ($input as $key => $imagesInput) {
            $images[$key] = $this->imagesRepository->create($imagesInput);
        }

        return new ImagesCollection($images);
    }

    /**
     * Bulk update Images's data.
     *
     * @param BulkUpdateImagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ImagesCollection
     */
    public function bulkUpdate(BulkUpdateImagesAPIRequest $request): ImagesCollection
    {
        $images = collect();

        $input = $request->get('data');
        foreach ($input as $key => $imagesInput) {
            $images[$key] = $this->imagesRepository->update($imagesInput, $imagesInput['id']);
        }

        return new ImagesCollection($images);
    }
}

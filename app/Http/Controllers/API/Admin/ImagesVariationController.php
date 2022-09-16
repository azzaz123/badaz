<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateImagesVariationAPIRequest;
use App\Http\Requests\Admin\BulkUpdateImagesVariationAPIRequest;
use App\Http\Requests\Admin\CreateImagesVariationAPIRequest;
use App\Http\Requests\Admin\UpdateImagesVariationAPIRequest;
use App\Http\Resources\Admin\ImagesVariationCollection;
use App\Http\Resources\Admin\ImagesVariationResource;
use App\Repositories\ImagesVariationRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ImagesVariationController extends AppBaseController
{
    /**
     * @var ImagesVariationRepository
     */
    private ImagesVariationRepository $imagesVariationRepository;

    /**
     * @param ImagesVariationRepository $imagesVariationRepository
     */
    public function __construct(ImagesVariationRepository $imagesVariationRepository)
    {
        $this->imagesVariationRepository = $imagesVariationRepository;
    }

    /**
     * ImagesVariation's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ImagesVariationCollection
     */
    public function index(Request $request): ImagesVariationCollection
    {
        $imagesVariations = $this->imagesVariationRepository->fetch($request);

        return new ImagesVariationCollection($imagesVariations);
    }

    /**
     * Create ImagesVariation with given payload.
     *
     * @param CreateImagesVariationAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ImagesVariationResource
     */
    public function store(CreateImagesVariationAPIRequest $request): ImagesVariationResource
    {
        $input = $request->all();
        $imagesVariation = $this->imagesVariationRepository->create($input);

        return new ImagesVariationResource($imagesVariation);
    }

    /**
     * Get single ImagesVariation record.
     *
     * @param int $id
     *
     * @return ImagesVariationResource
     */
    public function show(int $id): ImagesVariationResource
    {
        $imagesVariation = $this->imagesVariationRepository->findOrFail($id);

        return new ImagesVariationResource($imagesVariation);
    }

    /**
     * Update ImagesVariation with given payload.
     *
     * @param UpdateImagesVariationAPIRequest $request
     * @param int                             $id
     *
     * @throws ValidatorException
     *
     * @return ImagesVariationResource
     */
    public function update(UpdateImagesVariationAPIRequest $request, int $id): ImagesVariationResource
    {
        $input = $request->all();
        $imagesVariation = $this->imagesVariationRepository->update($input, $id);

        return new ImagesVariationResource($imagesVariation);
    }

    /**
     * Delete given ImagesVariation.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->imagesVariationRepository->delete($id);

        return $this->successResponse('ImagesVariation deleted successfully.');
    }

    /**
     * Bulk create ImagesVariation's.
     *
     * @param BulkCreateImagesVariationAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ImagesVariationCollection
     */
    public function bulkStore(BulkCreateImagesVariationAPIRequest $request): ImagesVariationCollection
    {
        $imagesVariations = collect();

        $input = $request->get('data');
        foreach ($input as $key => $imagesVariationInput) {
            $imagesVariations[$key] = $this->imagesVariationRepository->create($imagesVariationInput);
        }

        return new ImagesVariationCollection($imagesVariations);
    }

    /**
     * Bulk update ImagesVariation's data.
     *
     * @param BulkUpdateImagesVariationAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ImagesVariationCollection
     */
    public function bulkUpdate(BulkUpdateImagesVariationAPIRequest $request): ImagesVariationCollection
    {
        $imagesVariations = collect();

        $input = $request->get('data');
        foreach ($input as $key => $imagesVariationInput) {
            $imagesVariations[$key] = $this->imagesVariationRepository->update($imagesVariationInput, $imagesVariationInput['id']);
        }

        return new ImagesVariationCollection($imagesVariations);
    }
}

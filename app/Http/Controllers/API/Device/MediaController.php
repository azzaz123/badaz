<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateMediaAPIRequest;
use App\Http\Requests\Device\BulkUpdateMediaAPIRequest;
use App\Http\Requests\Device\CreateMediaAPIRequest;
use App\Http\Requests\Device\UpdateMediaAPIRequest;
use App\Http\Resources\Device\MediaCollection;
use App\Http\Resources\Device\MediaResource;
use App\Repositories\MediaRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class MediaController extends AppBaseController
{
    /**
     * @var MediaRepository
     */
    private MediaRepository $mediaRepository;

    /**
     * @param MediaRepository $mediaRepository
     */
    public function __construct(MediaRepository $mediaRepository)
    {
        $this->mediaRepository = $mediaRepository;
    }

    /**
     * Media's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return MediaCollection
     */
    public function index(Request $request): MediaCollection
    {
        $media = $this->mediaRepository->fetch($request);

        return new MediaCollection($media);
    }

    /**
     * Create Media with given payload.
     *
     * @param CreateMediaAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MediaResource
     */
    public function store(CreateMediaAPIRequest $request): MediaResource
    {
        $input = $request->all();
        $media = $this->mediaRepository->create($input);

        return new MediaResource($media);
    }

    /**
     * Get single Media record.
     *
     * @param int $id
     *
     * @return MediaResource
     */
    public function show(int $id): MediaResource
    {
        $media = $this->mediaRepository->findOrFail($id);

        return new MediaResource($media);
    }

    /**
     * Update Media with given payload.
     *
     * @param UpdateMediaAPIRequest $request
     * @param int                   $id
     *
     * @throws ValidatorException
     *
     * @return MediaResource
     */
    public function update(UpdateMediaAPIRequest $request, int $id): MediaResource
    {
        $input = $request->all();
        $media = $this->mediaRepository->update($input, $id);

        return new MediaResource($media);
    }

    /**
     * Delete given Media.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->mediaRepository->delete($id);

        return $this->successResponse('Media deleted successfully.');
    }

    /**
     * Bulk create Media's.
     *
     * @param BulkCreateMediaAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MediaCollection
     */
    public function bulkStore(BulkCreateMediaAPIRequest $request): MediaCollection
    {
        $media = collect();

        $input = $request->get('data');
        foreach ($input as $key => $mediaInput) {
            $media[$key] = $this->mediaRepository->create($mediaInput);
        }

        return new MediaCollection($media);
    }

    /**
     * Bulk update Media's data.
     *
     * @param BulkUpdateMediaAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return MediaCollection
     */
    public function bulkUpdate(BulkUpdateMediaAPIRequest $request): MediaCollection
    {
        $media = collect();

        $input = $request->get('data');
        foreach ($input as $key => $mediaInput) {
            $media[$key] = $this->mediaRepository->update($mediaInput, $mediaInput['id']);
        }

        return new MediaCollection($media);
    }
}

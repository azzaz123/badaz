<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateFontsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateFontsAPIRequest;
use App\Http\Requests\Admin\CreateFontsAPIRequest;
use App\Http\Requests\Admin\UpdateFontsAPIRequest;
use App\Http\Resources\Admin\FontsCollection;
use App\Http\Resources\Admin\FontsResource;
use App\Repositories\FontsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class FontsController extends AppBaseController
{
    /**
     * @var FontsRepository
     */
    private FontsRepository $fontsRepository;

    /**
     * @param FontsRepository $fontsRepository
     */
    public function __construct(FontsRepository $fontsRepository)
    {
        $this->fontsRepository = $fontsRepository;
    }

    /**
     * Fonts's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return FontsCollection
     */
    public function index(Request $request): FontsCollection
    {
        $fonts = $this->fontsRepository->fetch($request);

        return new FontsCollection($fonts);
    }

    /**
     * Create Fonts with given payload.
     *
     * @param CreateFontsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return FontsResource
     */
    public function store(CreateFontsAPIRequest $request): FontsResource
    {
        $input = $request->all();
        $fonts = $this->fontsRepository->create($input);

        return new FontsResource($fonts);
    }

    /**
     * Get single Fonts record.
     *
     * @param int $id
     *
     * @return FontsResource
     */
    public function show(int $id): FontsResource
    {
        $fonts = $this->fontsRepository->findOrFail($id);

        return new FontsResource($fonts);
    }

    /**
     * Update Fonts with given payload.
     *
     * @param UpdateFontsAPIRequest $request
     * @param int                   $id
     *
     * @throws ValidatorException
     *
     * @return FontsResource
     */
    public function update(UpdateFontsAPIRequest $request, int $id): FontsResource
    {
        $input = $request->all();
        $fonts = $this->fontsRepository->update($input, $id);

        return new FontsResource($fonts);
    }

    /**
     * Delete given Fonts.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->fontsRepository->delete($id);

        return $this->successResponse('Fonts deleted successfully.');
    }

    /**
     * Bulk create Fonts's.
     *
     * @param BulkCreateFontsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return FontsCollection
     */
    public function bulkStore(BulkCreateFontsAPIRequest $request): FontsCollection
    {
        $fonts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $fontsInput) {
            $fonts[$key] = $this->fontsRepository->create($fontsInput);
        }

        return new FontsCollection($fonts);
    }

    /**
     * Bulk update Fonts's data.
     *
     * @param BulkUpdateFontsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return FontsCollection
     */
    public function bulkUpdate(BulkUpdateFontsAPIRequest $request): FontsCollection
    {
        $fonts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $fontsInput) {
            $fonts[$key] = $this->fontsRepository->update($fontsInput, $fontsInput['id']);
        }

        return new FontsCollection($fonts);
    }
}

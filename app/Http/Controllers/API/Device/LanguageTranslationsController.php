<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateLanguageTranslationsAPIRequest;
use App\Http\Requests\Device\BulkUpdateLanguageTranslationsAPIRequest;
use App\Http\Requests\Device\CreateLanguageTranslationsAPIRequest;
use App\Http\Requests\Device\UpdateLanguageTranslationsAPIRequest;
use App\Http\Resources\Device\LanguageTranslationsCollection;
use App\Http\Resources\Device\LanguageTranslationsResource;
use App\Repositories\LanguageTranslationsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class LanguageTranslationsController extends AppBaseController
{
    /**
     * @var LanguageTranslationsRepository
     */
    private LanguageTranslationsRepository $languageTranslationsRepository;

    /**
     * @param LanguageTranslationsRepository $languageTranslationsRepository
     */
    public function __construct(LanguageTranslationsRepository $languageTranslationsRepository)
    {
        $this->languageTranslationsRepository = $languageTranslationsRepository;
    }

    /**
     * LanguageTranslations's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return LanguageTranslationsCollection
     */
    public function index(Request $request): LanguageTranslationsCollection
    {
        $languageTranslations = $this->languageTranslationsRepository->fetch($request);

        return new LanguageTranslationsCollection($languageTranslations);
    }

    /**
     * Create LanguageTranslations with given payload.
     *
     * @param CreateLanguageTranslationsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return LanguageTranslationsResource
     */
    public function store(CreateLanguageTranslationsAPIRequest $request): LanguageTranslationsResource
    {
        $input = $request->all();
        $languageTranslations = $this->languageTranslationsRepository->create($input);

        return new LanguageTranslationsResource($languageTranslations);
    }

    /**
     * Get single LanguageTranslations record.
     *
     * @param int $id
     *
     * @return LanguageTranslationsResource
     */
    public function show(int $id): LanguageTranslationsResource
    {
        $languageTranslations = $this->languageTranslationsRepository->findOrFail($id);

        return new LanguageTranslationsResource($languageTranslations);
    }

    /**
     * Update LanguageTranslations with given payload.
     *
     * @param UpdateLanguageTranslationsAPIRequest $request
     * @param int                                  $id
     *
     * @throws ValidatorException
     *
     * @return LanguageTranslationsResource
     */
    public function update(UpdateLanguageTranslationsAPIRequest $request, int $id): LanguageTranslationsResource
    {
        $input = $request->all();
        $languageTranslations = $this->languageTranslationsRepository->update($input, $id);

        return new LanguageTranslationsResource($languageTranslations);
    }

    /**
     * Delete given LanguageTranslations.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->languageTranslationsRepository->delete($id);

        return $this->successResponse('LanguageTranslations deleted successfully.');
    }

    /**
     * Bulk create LanguageTranslations's.
     *
     * @param BulkCreateLanguageTranslationsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return LanguageTranslationsCollection
     */
    public function bulkStore(BulkCreateLanguageTranslationsAPIRequest $request): LanguageTranslationsCollection
    {
        $languageTranslations = collect();

        $input = $request->get('data');
        foreach ($input as $key => $languageTranslationsInput) {
            $languageTranslations[$key] = $this->languageTranslationsRepository->create($languageTranslationsInput);
        }

        return new LanguageTranslationsCollection($languageTranslations);
    }

    /**
     * Bulk update LanguageTranslations's data.
     *
     * @param BulkUpdateLanguageTranslationsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return LanguageTranslationsCollection
     */
    public function bulkUpdate(BulkUpdateLanguageTranslationsAPIRequest $request): LanguageTranslationsCollection
    {
        $languageTranslations = collect();

        $input = $request->get('data');
        foreach ($input as $key => $languageTranslationsInput) {
            $languageTranslations[$key] = $this->languageTranslationsRepository->update($languageTranslationsInput, $languageTranslationsInput['id']);
        }

        return new LanguageTranslationsCollection($languageTranslations);
    }
}

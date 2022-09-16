<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateCustomFieldsOptionsLangAPIRequest;
use App\Http\Requests\Device\BulkUpdateCustomFieldsOptionsLangAPIRequest;
use App\Http\Requests\Device\CreateCustomFieldsOptionsLangAPIRequest;
use App\Http\Requests\Device\UpdateCustomFieldsOptionsLangAPIRequest;
use App\Http\Resources\Device\CustomFieldsOptionsLangCollection;
use App\Http\Resources\Device\CustomFieldsOptionsLangResource;
use App\Repositories\CustomFieldsOptionsLangRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class CustomFieldsOptionsLangController extends AppBaseController
{
    /**
     * @var CustomFieldsOptionsLangRepository
     */
    private CustomFieldsOptionsLangRepository $customFieldsOptionsLangRepository;

    /**
     * @param CustomFieldsOptionsLangRepository $customFieldsOptionsLangRepository
     */
    public function __construct(CustomFieldsOptionsLangRepository $customFieldsOptionsLangRepository)
    {
        $this->customFieldsOptionsLangRepository = $customFieldsOptionsLangRepository;
    }

    /**
     * CustomFieldsOptionsLang's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return CustomFieldsOptionsLangCollection
     */
    public function index(Request $request): CustomFieldsOptionsLangCollection
    {
        $customFieldsOptionsLangs = $this->customFieldsOptionsLangRepository->fetch($request);

        return new CustomFieldsOptionsLangCollection($customFieldsOptionsLangs);
    }

    /**
     * Create CustomFieldsOptionsLang with given payload.
     *
     * @param CreateCustomFieldsOptionsLangAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsOptionsLangResource
     */
    public function store(CreateCustomFieldsOptionsLangAPIRequest $request): CustomFieldsOptionsLangResource
    {
        $input = $request->all();
        $customFieldsOptionsLang = $this->customFieldsOptionsLangRepository->create($input);

        return new CustomFieldsOptionsLangResource($customFieldsOptionsLang);
    }

    /**
     * Get single CustomFieldsOptionsLang record.
     *
     * @param int $id
     *
     * @return CustomFieldsOptionsLangResource
     */
    public function show(int $id): CustomFieldsOptionsLangResource
    {
        $customFieldsOptionsLang = $this->customFieldsOptionsLangRepository->findOrFail($id);

        return new CustomFieldsOptionsLangResource($customFieldsOptionsLang);
    }

    /**
     * Update CustomFieldsOptionsLang with given payload.
     *
     * @param UpdateCustomFieldsOptionsLangAPIRequest $request
     * @param int                                     $id
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsOptionsLangResource
     */
    public function update(UpdateCustomFieldsOptionsLangAPIRequest $request, int $id): CustomFieldsOptionsLangResource
    {
        $input = $request->all();
        $customFieldsOptionsLang = $this->customFieldsOptionsLangRepository->update($input, $id);

        return new CustomFieldsOptionsLangResource($customFieldsOptionsLang);
    }

    /**
     * Delete given CustomFieldsOptionsLang.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->customFieldsOptionsLangRepository->delete($id);

        return $this->successResponse('CustomFieldsOptionsLang deleted successfully.');
    }

    /**
     * Bulk create CustomFieldsOptionsLang's.
     *
     * @param BulkCreateCustomFieldsOptionsLangAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsOptionsLangCollection
     */
    public function bulkStore(BulkCreateCustomFieldsOptionsLangAPIRequest $request): CustomFieldsOptionsLangCollection
    {
        $customFieldsOptionsLangs = collect();

        $input = $request->get('data');
        foreach ($input as $key => $customFieldsOptionsLangInput) {
            $customFieldsOptionsLangs[$key] = $this->customFieldsOptionsLangRepository->create($customFieldsOptionsLangInput);
        }

        return new CustomFieldsOptionsLangCollection($customFieldsOptionsLangs);
    }

    /**
     * Bulk update CustomFieldsOptionsLang's data.
     *
     * @param BulkUpdateCustomFieldsOptionsLangAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CustomFieldsOptionsLangCollection
     */
    public function bulkUpdate(BulkUpdateCustomFieldsOptionsLangAPIRequest $request): CustomFieldsOptionsLangCollection
    {
        $customFieldsOptionsLangs = collect();

        $input = $request->get('data');
        foreach ($input as $key => $customFieldsOptionsLangInput) {
            $customFieldsOptionsLangs[$key] = $this->customFieldsOptionsLangRepository->update($customFieldsOptionsLangInput, $customFieldsOptionsLangInput['id']);
        }

        return new CustomFieldsOptionsLangCollection($customFieldsOptionsLangs);
    }
}

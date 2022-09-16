<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateLanguagesAPIRequest;
use App\Http\Requests\Admin\BulkUpdateLanguagesAPIRequest;
use App\Http\Requests\Admin\CreateLanguagesAPIRequest;
use App\Http\Requests\Admin\UpdateLanguagesAPIRequest;
use App\Http\Resources\Admin\LanguagesCollection;
use App\Http\Resources\Admin\LanguagesResource;
use App\Repositories\LanguagesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class LanguagesController extends AppBaseController
{
    /**
     * @var LanguagesRepository
     */
    private LanguagesRepository $languagesRepository;

    /**
     * @param LanguagesRepository $languagesRepository
     */
    public function __construct(LanguagesRepository $languagesRepository)
    {
        $this->languagesRepository = $languagesRepository;
    }

    /**
     * Languages's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return LanguagesCollection
     */
    public function index(Request $request): LanguagesCollection
    {
        $languages = $this->languagesRepository->fetch($request);

        return new LanguagesCollection($languages);
    }

    /**
     * Create Languages with given payload.
     *
     * @param CreateLanguagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return LanguagesResource
     */
    public function store(CreateLanguagesAPIRequest $request): LanguagesResource
    {
        $input = $request->all();
        $languages = $this->languagesRepository->create($input);

        return new LanguagesResource($languages);
    }

    /**
     * Get single Languages record.
     *
     * @param int $id
     *
     * @return LanguagesResource
     */
    public function show(int $id): LanguagesResource
    {
        $languages = $this->languagesRepository->findOrFail($id);

        return new LanguagesResource($languages);
    }

    /**
     * Update Languages with given payload.
     *
     * @param UpdateLanguagesAPIRequest $request
     * @param int                       $id
     *
     * @throws ValidatorException
     *
     * @return LanguagesResource
     */
    public function update(UpdateLanguagesAPIRequest $request, int $id): LanguagesResource
    {
        $input = $request->all();
        $languages = $this->languagesRepository->update($input, $id);

        return new LanguagesResource($languages);
    }

    /**
     * Delete given Languages.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->languagesRepository->delete($id);

        return $this->successResponse('Languages deleted successfully.');
    }

    /**
     * Bulk create Languages's.
     *
     * @param BulkCreateLanguagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return LanguagesCollection
     */
    public function bulkStore(BulkCreateLanguagesAPIRequest $request): LanguagesCollection
    {
        $languages = collect();

        $input = $request->get('data');
        foreach ($input as $key => $languagesInput) {
            $languages[$key] = $this->languagesRepository->create($languagesInput);
        }

        return new LanguagesCollection($languages);
    }

    /**
     * Bulk update Languages's data.
     *
     * @param BulkUpdateLanguagesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return LanguagesCollection
     */
    public function bulkUpdate(BulkUpdateLanguagesAPIRequest $request): LanguagesCollection
    {
        $languages = collect();

        $input = $request->get('data');
        foreach ($input as $key => $languagesInput) {
            $languages[$key] = $this->languagesRepository->update($languagesInput, $languagesInput['id']);
        }

        return new LanguagesCollection($languages);
    }
}

<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateCurrenciesAPIRequest;
use App\Http\Requests\Device\BulkUpdateCurrenciesAPIRequest;
use App\Http\Requests\Device\CreateCurrenciesAPIRequest;
use App\Http\Requests\Device\UpdateCurrenciesAPIRequest;
use App\Http\Resources\Device\CurrenciesCollection;
use App\Http\Resources\Device\CurrenciesResource;
use App\Repositories\CurrenciesRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class CurrenciesController extends AppBaseController
{
    /**
     * @var CurrenciesRepository
     */
    private CurrenciesRepository $currenciesRepository;

    /**
     * @param CurrenciesRepository $currenciesRepository
     */
    public function __construct(CurrenciesRepository $currenciesRepository)
    {
        $this->currenciesRepository = $currenciesRepository;
    }

    /**
     * Currencies's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return CurrenciesCollection
     */
    public function index(Request $request): CurrenciesCollection
    {
        $currencies = $this->currenciesRepository->fetch($request);

        return new CurrenciesCollection($currencies);
    }

    /**
     * Create Currencies with given payload.
     *
     * @param CreateCurrenciesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CurrenciesResource
     */
    public function store(CreateCurrenciesAPIRequest $request): CurrenciesResource
    {
        $input = $request->all();
        $currencies = $this->currenciesRepository->create($input);

        return new CurrenciesResource($currencies);
    }

    /**
     * Get single Currencies record.
     *
     * @param int $id
     *
     * @return CurrenciesResource
     */
    public function show(int $id): CurrenciesResource
    {
        $currencies = $this->currenciesRepository->findOrFail($id);

        return new CurrenciesResource($currencies);
    }

    /**
     * Update Currencies with given payload.
     *
     * @param UpdateCurrenciesAPIRequest $request
     * @param int                        $id
     *
     * @throws ValidatorException
     *
     * @return CurrenciesResource
     */
    public function update(UpdateCurrenciesAPIRequest $request, int $id): CurrenciesResource
    {
        $input = $request->all();
        $currencies = $this->currenciesRepository->update($input, $id);

        return new CurrenciesResource($currencies);
    }

    /**
     * Delete given Currencies.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->currenciesRepository->delete($id);

        return $this->successResponse('Currencies deleted successfully.');
    }

    /**
     * Bulk create Currencies's.
     *
     * @param BulkCreateCurrenciesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CurrenciesCollection
     */
    public function bulkStore(BulkCreateCurrenciesAPIRequest $request): CurrenciesCollection
    {
        $currencies = collect();

        $input = $request->get('data');
        foreach ($input as $key => $currenciesInput) {
            $currencies[$key] = $this->currenciesRepository->create($currenciesInput);
        }

        return new CurrenciesCollection($currencies);
    }

    /**
     * Bulk update Currencies's data.
     *
     * @param BulkUpdateCurrenciesAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return CurrenciesCollection
     */
    public function bulkUpdate(BulkUpdateCurrenciesAPIRequest $request): CurrenciesCollection
    {
        $currencies = collect();

        $input = $request->get('data');
        foreach ($input as $key => $currenciesInput) {
            $currencies[$key] = $this->currenciesRepository->update($currenciesInput, $currenciesInput['id']);
        }

        return new CurrenciesCollection($currencies);
    }
}

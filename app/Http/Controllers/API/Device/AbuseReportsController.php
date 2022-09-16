<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateAbuseReportsAPIRequest;
use App\Http\Requests\Device\BulkUpdateAbuseReportsAPIRequest;
use App\Http\Requests\Device\CreateAbuseReportsAPIRequest;
use App\Http\Requests\Device\UpdateAbuseReportsAPIRequest;
use App\Http\Resources\Device\AbuseReportsCollection;
use App\Http\Resources\Device\AbuseReportsResource;
use App\Repositories\AbuseReportsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class AbuseReportsController extends AppBaseController
{
    /**
     * @var AbuseReportsRepository
     */
    private AbuseReportsRepository $abuseReportsRepository;

    /**
     * @param AbuseReportsRepository $abuseReportsRepository
     */
    public function __construct(AbuseReportsRepository $abuseReportsRepository)
    {
        $this->abuseReportsRepository = $abuseReportsRepository;
    }

    /**
     * AbuseReports's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return AbuseReportsCollection
     */
    public function index(Request $request): AbuseReportsCollection
    {
        $abuseReports = $this->abuseReportsRepository->fetch($request);

        return new AbuseReportsCollection($abuseReports);
    }

    /**
     * Create AbuseReports with given payload.
     *
     * @param CreateAbuseReportsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return AbuseReportsResource
     */
    public function store(CreateAbuseReportsAPIRequest $request): AbuseReportsResource
    {
        $input = $request->all();
        $abuseReports = $this->abuseReportsRepository->create($input);

        return new AbuseReportsResource($abuseReports);
    }

    /**
     * Get single AbuseReports record.
     *
     * @param int $id
     *
     * @return AbuseReportsResource
     */
    public function show(int $id): AbuseReportsResource
    {
        $abuseReports = $this->abuseReportsRepository->findOrFail($id);

        return new AbuseReportsResource($abuseReports);
    }

    /**
     * Update AbuseReports with given payload.
     *
     * @param UpdateAbuseReportsAPIRequest $request
     * @param int                          $id
     *
     * @throws ValidatorException
     *
     * @return AbuseReportsResource
     */
    public function update(UpdateAbuseReportsAPIRequest $request, int $id): AbuseReportsResource
    {
        $input = $request->all();
        $abuseReports = $this->abuseReportsRepository->update($input, $id);

        return new AbuseReportsResource($abuseReports);
    }

    /**
     * Delete given AbuseReports.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->abuseReportsRepository->delete($id);

        return $this->successResponse('AbuseReports deleted successfully.');
    }

    /**
     * Bulk create AbuseReports's.
     *
     * @param BulkCreateAbuseReportsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return AbuseReportsCollection
     */
    public function bulkStore(BulkCreateAbuseReportsAPIRequest $request): AbuseReportsCollection
    {
        $abuseReports = collect();

        $input = $request->get('data');
        foreach ($input as $key => $abuseReportsInput) {
            $abuseReports[$key] = $this->abuseReportsRepository->create($abuseReportsInput);
        }

        return new AbuseReportsCollection($abuseReports);
    }

    /**
     * Bulk update AbuseReports's data.
     *
     * @param BulkUpdateAbuseReportsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return AbuseReportsCollection
     */
    public function bulkUpdate(BulkUpdateAbuseReportsAPIRequest $request): AbuseReportsCollection
    {
        $abuseReports = collect();

        $input = $request->get('data');
        foreach ($input as $key => $abuseReportsInput) {
            $abuseReports[$key] = $this->abuseReportsRepository->update($abuseReportsInput, $abuseReportsInput['id']);
        }

        return new AbuseReportsCollection($abuseReports);
    }
}

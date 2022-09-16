<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateHomepageBannersAPIRequest;
use App\Http\Requests\Device\BulkUpdateHomepageBannersAPIRequest;
use App\Http\Requests\Device\CreateHomepageBannersAPIRequest;
use App\Http\Requests\Device\UpdateHomepageBannersAPIRequest;
use App\Http\Resources\Device\HomepageBannersCollection;
use App\Http\Resources\Device\HomepageBannersResource;
use App\Repositories\HomepageBannersRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class HomepageBannersController extends AppBaseController
{
    /**
     * @var HomepageBannersRepository
     */
    private HomepageBannersRepository $homepageBannersRepository;

    /**
     * @param HomepageBannersRepository $homepageBannersRepository
     */
    public function __construct(HomepageBannersRepository $homepageBannersRepository)
    {
        $this->homepageBannersRepository = $homepageBannersRepository;
    }

    /**
     * HomepageBanners's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return HomepageBannersCollection
     */
    public function index(Request $request): HomepageBannersCollection
    {
        $homepageBanners = $this->homepageBannersRepository->fetch($request);

        return new HomepageBannersCollection($homepageBanners);
    }

    /**
     * Create HomepageBanners with given payload.
     *
     * @param CreateHomepageBannersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return HomepageBannersResource
     */
    public function store(CreateHomepageBannersAPIRequest $request): HomepageBannersResource
    {
        $input = $request->all();
        $homepageBanners = $this->homepageBannersRepository->create($input);

        return new HomepageBannersResource($homepageBanners);
    }

    /**
     * Get single HomepageBanners record.
     *
     * @param int $id
     *
     * @return HomepageBannersResource
     */
    public function show(int $id): HomepageBannersResource
    {
        $homepageBanners = $this->homepageBannersRepository->findOrFail($id);

        return new HomepageBannersResource($homepageBanners);
    }

    /**
     * Update HomepageBanners with given payload.
     *
     * @param UpdateHomepageBannersAPIRequest $request
     * @param int                             $id
     *
     * @throws ValidatorException
     *
     * @return HomepageBannersResource
     */
    public function update(UpdateHomepageBannersAPIRequest $request, int $id): HomepageBannersResource
    {
        $input = $request->all();
        $homepageBanners = $this->homepageBannersRepository->update($input, $id);

        return new HomepageBannersResource($homepageBanners);
    }

    /**
     * Delete given HomepageBanners.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->homepageBannersRepository->delete($id);

        return $this->successResponse('HomepageBanners deleted successfully.');
    }

    /**
     * Bulk create HomepageBanners's.
     *
     * @param BulkCreateHomepageBannersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return HomepageBannersCollection
     */
    public function bulkStore(BulkCreateHomepageBannersAPIRequest $request): HomepageBannersCollection
    {
        $homepageBanners = collect();

        $input = $request->get('data');
        foreach ($input as $key => $homepageBannersInput) {
            $homepageBanners[$key] = $this->homepageBannersRepository->create($homepageBannersInput);
        }

        return new HomepageBannersCollection($homepageBanners);
    }

    /**
     * Bulk update HomepageBanners's data.
     *
     * @param BulkUpdateHomepageBannersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return HomepageBannersCollection
     */
    public function bulkUpdate(BulkUpdateHomepageBannersAPIRequest $request): HomepageBannersCollection
    {
        $homepageBanners = collect();

        $input = $request->get('data');
        foreach ($input as $key => $homepageBannersInput) {
            $homepageBanners[$key] = $this->homepageBannersRepository->update($homepageBannersInput, $homepageBannersInput['id']);
        }

        return new HomepageBannersCollection($homepageBanners);
    }
}

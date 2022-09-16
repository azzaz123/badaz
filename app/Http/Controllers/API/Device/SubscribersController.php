<?php

namespace App\Http\Controllers\API\Device;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Device\BulkCreateSubscribersAPIRequest;
use App\Http\Requests\Device\BulkUpdateSubscribersAPIRequest;
use App\Http\Requests\Device\CreateSubscribersAPIRequest;
use App\Http\Requests\Device\UpdateSubscribersAPIRequest;
use App\Http\Resources\Device\SubscribersCollection;
use App\Http\Resources\Device\SubscribersResource;
use App\Repositories\SubscribersRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class SubscribersController extends AppBaseController
{
    /**
     * @var SubscribersRepository
     */
    private SubscribersRepository $subscribersRepository;

    /**
     * @param SubscribersRepository $subscribersRepository
     */
    public function __construct(SubscribersRepository $subscribersRepository)
    {
        $this->subscribersRepository = $subscribersRepository;
    }

    /**
     * Subscribers's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return SubscribersCollection
     */
    public function index(Request $request): SubscribersCollection
    {
        $subscribers = $this->subscribersRepository->fetch($request);

        return new SubscribersCollection($subscribers);
    }

    /**
     * Create Subscribers with given payload.
     *
     * @param CreateSubscribersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return SubscribersResource
     */
    public function store(CreateSubscribersAPIRequest $request): SubscribersResource
    {
        $input = $request->all();
        $subscribers = $this->subscribersRepository->create($input);

        return new SubscribersResource($subscribers);
    }

    /**
     * Get single Subscribers record.
     *
     * @param int $id
     *
     * @return SubscribersResource
     */
    public function show(int $id): SubscribersResource
    {
        $subscribers = $this->subscribersRepository->findOrFail($id);

        return new SubscribersResource($subscribers);
    }

    /**
     * Update Subscribers with given payload.
     *
     * @param UpdateSubscribersAPIRequest $request
     * @param int                         $id
     *
     * @throws ValidatorException
     *
     * @return SubscribersResource
     */
    public function update(UpdateSubscribersAPIRequest $request, int $id): SubscribersResource
    {
        $input = $request->all();
        $subscribers = $this->subscribersRepository->update($input, $id);

        return new SubscribersResource($subscribers);
    }

    /**
     * Delete given Subscribers.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->subscribersRepository->delete($id);

        return $this->successResponse('Subscribers deleted successfully.');
    }

    /**
     * Bulk create Subscribers's.
     *
     * @param BulkCreateSubscribersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return SubscribersCollection
     */
    public function bulkStore(BulkCreateSubscribersAPIRequest $request): SubscribersCollection
    {
        $subscribers = collect();

        $input = $request->get('data');
        foreach ($input as $key => $subscribersInput) {
            $subscribers[$key] = $this->subscribersRepository->create($subscribersInput);
        }

        return new SubscribersCollection($subscribers);
    }

    /**
     * Bulk update Subscribers's data.
     *
     * @param BulkUpdateSubscribersAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return SubscribersCollection
     */
    public function bulkUpdate(BulkUpdateSubscribersAPIRequest $request): SubscribersCollection
    {
        $subscribers = collect();

        $input = $request->get('data');
        foreach ($input as $key => $subscribersInput) {
            $subscribers[$key] = $this->subscribersRepository->update($subscribersInput, $subscribersInput['id']);
        }

        return new SubscribersCollection($subscribers);
    }
}

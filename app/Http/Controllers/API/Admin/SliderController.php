<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateSliderAPIRequest;
use App\Http\Requests\Admin\BulkUpdateSliderAPIRequest;
use App\Http\Requests\Admin\CreateSliderAPIRequest;
use App\Http\Requests\Admin\UpdateSliderAPIRequest;
use App\Http\Resources\Admin\SliderCollection;
use App\Http\Resources\Admin\SliderResource;
use App\Repositories\SliderRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class SliderController extends AppBaseController
{
    /**
     * @var SliderRepository
     */
    private SliderRepository $sliderRepository;

    /**
     * @param SliderRepository $sliderRepository
     */
    public function __construct(SliderRepository $sliderRepository)
    {
        $this->sliderRepository = $sliderRepository;
    }

    /**
     * Slider's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return SliderCollection
     */
    public function index(Request $request): SliderCollection
    {
        $sliders = $this->sliderRepository->fetch($request);

        return new SliderCollection($sliders);
    }

    /**
     * Create Slider with given payload.
     *
     * @param CreateSliderAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return SliderResource
     */
    public function store(CreateSliderAPIRequest $request): SliderResource
    {
        $input = $request->all();
        $slider = $this->sliderRepository->create($input);

        return new SliderResource($slider);
    }

    /**
     * Get single Slider record.
     *
     * @param int $id
     *
     * @return SliderResource
     */
    public function show(int $id): SliderResource
    {
        $slider = $this->sliderRepository->findOrFail($id);

        return new SliderResource($slider);
    }

    /**
     * Update Slider with given payload.
     *
     * @param UpdateSliderAPIRequest $request
     * @param int                    $id
     *
     * @throws ValidatorException
     *
     * @return SliderResource
     */
    public function update(UpdateSliderAPIRequest $request, int $id): SliderResource
    {
        $input = $request->all();
        $slider = $this->sliderRepository->update($input, $id);

        return new SliderResource($slider);
    }

    /**
     * Delete given Slider.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->sliderRepository->delete($id);

        return $this->successResponse('Slider deleted successfully.');
    }

    /**
     * Bulk create Slider's.
     *
     * @param BulkCreateSliderAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return SliderCollection
     */
    public function bulkStore(BulkCreateSliderAPIRequest $request): SliderCollection
    {
        $sliders = collect();

        $input = $request->get('data');
        foreach ($input as $key => $sliderInput) {
            $sliders[$key] = $this->sliderRepository->create($sliderInput);
        }

        return new SliderCollection($sliders);
    }

    /**
     * Bulk update Slider's data.
     *
     * @param BulkUpdateSliderAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return SliderCollection
     */
    public function bulkUpdate(BulkUpdateSliderAPIRequest $request): SliderCollection
    {
        $sliders = collect();

        $input = $request->get('data');
        foreach ($input as $key => $sliderInput) {
            $sliders[$key] = $this->sliderRepository->update($sliderInput, $sliderInput['id']);
        }

        return new SliderCollection($sliders);
    }
}

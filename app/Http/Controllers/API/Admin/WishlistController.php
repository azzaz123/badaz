<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateWishlistAPIRequest;
use App\Http\Requests\Admin\BulkUpdateWishlistAPIRequest;
use App\Http\Requests\Admin\CreateWishlistAPIRequest;
use App\Http\Requests\Admin\UpdateWishlistAPIRequest;
use App\Http\Resources\Admin\WishlistCollection;
use App\Http\Resources\Admin\WishlistResource;
use App\Repositories\WishlistRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class WishlistController extends AppBaseController
{
    /**
     * @var WishlistRepository
     */
    private WishlistRepository $wishlistRepository;

    /**
     * @param WishlistRepository $wishlistRepository
     */
    public function __construct(WishlistRepository $wishlistRepository)
    {
        $this->wishlistRepository = $wishlistRepository;
    }

    /**
     * Wishlist's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return WishlistCollection
     */
    public function index(Request $request): WishlistCollection
    {
        $wishlists = $this->wishlistRepository->fetch($request);

        return new WishlistCollection($wishlists);
    }

    /**
     * Create Wishlist with given payload.
     *
     * @param CreateWishlistAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return WishlistResource
     */
    public function store(CreateWishlistAPIRequest $request): WishlistResource
    {
        $input = $request->all();
        $wishlist = $this->wishlistRepository->create($input);

        return new WishlistResource($wishlist);
    }

    /**
     * Get single Wishlist record.
     *
     * @param int $id
     *
     * @return WishlistResource
     */
    public function show(int $id): WishlistResource
    {
        $wishlist = $this->wishlistRepository->findOrFail($id);

        return new WishlistResource($wishlist);
    }

    /**
     * Update Wishlist with given payload.
     *
     * @param UpdateWishlistAPIRequest $request
     * @param int                      $id
     *
     * @throws ValidatorException
     *
     * @return WishlistResource
     */
    public function update(UpdateWishlistAPIRequest $request, int $id): WishlistResource
    {
        $input = $request->all();
        $wishlist = $this->wishlistRepository->update($input, $id);

        return new WishlistResource($wishlist);
    }

    /**
     * Delete given Wishlist.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->wishlistRepository->delete($id);

        return $this->successResponse('Wishlist deleted successfully.');
    }

    /**
     * Bulk create Wishlist's.
     *
     * @param BulkCreateWishlistAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return WishlistCollection
     */
    public function bulkStore(BulkCreateWishlistAPIRequest $request): WishlistCollection
    {
        $wishlists = collect();

        $input = $request->get('data');
        foreach ($input as $key => $wishlistInput) {
            $wishlists[$key] = $this->wishlistRepository->create($wishlistInput);
        }

        return new WishlistCollection($wishlists);
    }

    /**
     * Bulk update Wishlist's data.
     *
     * @param BulkUpdateWishlistAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return WishlistCollection
     */
    public function bulkUpdate(BulkUpdateWishlistAPIRequest $request): WishlistCollection
    {
        $wishlists = collect();

        $input = $request->get('data');
        foreach ($input as $key => $wishlistInput) {
            $wishlists[$key] = $this->wishlistRepository->update($wishlistInput, $wishlistInput['id']);
        }

        return new WishlistCollection($wishlists);
    }
}

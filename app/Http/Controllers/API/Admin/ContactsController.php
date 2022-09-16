<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateContactsAPIRequest;
use App\Http\Requests\Admin\BulkUpdateContactsAPIRequest;
use App\Http\Requests\Admin\CreateContactsAPIRequest;
use App\Http\Requests\Admin\UpdateContactsAPIRequest;
use App\Http\Resources\Admin\ContactsCollection;
use App\Http\Resources\Admin\ContactsResource;
use App\Repositories\ContactsRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ContactsController extends AppBaseController
{
    /**
     * @var ContactsRepository
     */
    private ContactsRepository $contactsRepository;

    /**
     * @param ContactsRepository $contactsRepository
     */
    public function __construct(ContactsRepository $contactsRepository)
    {
        $this->contactsRepository = $contactsRepository;
    }

    /**
     * Contacts's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return ContactsCollection
     */
    public function index(Request $request): ContactsCollection
    {
        $contacts = $this->contactsRepository->fetch($request);

        return new ContactsCollection($contacts);
    }

    /**
     * Create Contacts with given payload.
     *
     * @param CreateContactsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ContactsResource
     */
    public function store(CreateContactsAPIRequest $request): ContactsResource
    {
        $input = $request->all();
        $contacts = $this->contactsRepository->create($input);

        return new ContactsResource($contacts);
    }

    /**
     * Get single Contacts record.
     *
     * @param int $id
     *
     * @return ContactsResource
     */
    public function show(int $id): ContactsResource
    {
        $contacts = $this->contactsRepository->findOrFail($id);

        return new ContactsResource($contacts);
    }

    /**
     * Update Contacts with given payload.
     *
     * @param UpdateContactsAPIRequest $request
     * @param int                      $id
     *
     * @throws ValidatorException
     *
     * @return ContactsResource
     */
    public function update(UpdateContactsAPIRequest $request, int $id): ContactsResource
    {
        $input = $request->all();
        $contacts = $this->contactsRepository->update($input, $id);

        return new ContactsResource($contacts);
    }

    /**
     * Delete given Contacts.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->contactsRepository->delete($id);

        return $this->successResponse('Contacts deleted successfully.');
    }

    /**
     * Bulk create Contacts's.
     *
     * @param BulkCreateContactsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ContactsCollection
     */
    public function bulkStore(BulkCreateContactsAPIRequest $request): ContactsCollection
    {
        $contacts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $contactsInput) {
            $contacts[$key] = $this->contactsRepository->create($contactsInput);
        }

        return new ContactsCollection($contacts);
    }

    /**
     * Bulk update Contacts's data.
     *
     * @param BulkUpdateContactsAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return ContactsCollection
     */
    public function bulkUpdate(BulkUpdateContactsAPIRequest $request): ContactsCollection
    {
        $contacts = collect();

        $input = $request->get('data');
        foreach ($input as $key => $contactsInput) {
            $contacts[$key] = $this->contactsRepository->update($contactsInput, $contactsInput['id']);
        }

        return new ContactsCollection($contacts);
    }
}

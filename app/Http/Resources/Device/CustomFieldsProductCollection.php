<?php

namespace App\Http\Resources\Device;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomFieldsProductCollection extends ResourceCollection
{
    /**
     * @param Request $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'data' => $this->collection,
        ];
    }
}

<?php

namespace App\Api\Npi\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class NpiCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection
                            ->map
                            ->toArray($request)
                            ->all(),
        ];
    }
}

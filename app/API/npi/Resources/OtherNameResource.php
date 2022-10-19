<?php

namespace App\Api\Npi\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OtherNameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'organization_name' => $this->resource['organization_name'] ?? null,
            'code' => $this->resource['code'],
            'type' => $this->resource['type'],
        ];
    }
}

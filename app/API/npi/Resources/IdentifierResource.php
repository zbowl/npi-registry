<?php

namespace App\Api\Npi\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IdentifierResource extends JsonResource
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
            'identifier' => $this->resource['identifier'],
            'code' => $this->resource['code'],
            'state' => $this->resource['state'],
            'issuer' => $this->resource['issuer'],
            'desc' => $this->resource['desc'],
        ];
    }
}

<?php

namespace App\Api\Npi\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PracticeLocationResource extends JsonResource
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
            'address_1'         => $this->resource['address_1'],
            'address_2'         => $this->resource['address_2'],
            'city'              => $this->resource['city'],
            'state'             => $this->resource['state'],
            'postal_code'       => $this->resource['postal_code'],
            'country_code'      => $this->resource['country_code'],
            'telephone_number'  => $this->resource['telephone_number'],
            'extension'         => $this->resource['telephone_number'],
            'country_name'      => $this->resource['country_name'],
        ];
    }
}

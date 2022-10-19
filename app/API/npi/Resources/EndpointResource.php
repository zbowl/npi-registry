<?php

namespace App\Api\Npi\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EndpointResource extends JsonResource
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
            'endpointType'              => $this->resource['endpointType'],
            'endpointTypeDescription'   => $this->resource['endpointTypeDescription'],
            'endpoint'                  => $this->resource['endpoint'],
            'affiliation'               => $this->resource['affiliation'],
            'endpointDescription'       => $this->resource['endpointDescription'],
            'affiliationName'           => $this->resource['affiliationName'],
            'use'                       => $this->resource['use'],
            'useDescription'            => $this->resource['useDescription'],
            'useOtherDescription'       => $this->resource['useOtherDescription'],
            'contentType'               => $this->resource['contentType'],
            'contentTypeDescription'    => $this->resource['contentTypeDescription'],
            'contentOtherDescription'   => $this->resource['contentOtherDescription'],
            'address_1'                 => $this->resource['address_1'],
            'address_2'                 => $this->resource['address_2'],
            'city'                      => $this->resource['city'],
            'state'                     => $this->resource['state'],
            'country_code'              => $this->resource['country_code'],
            'postal_code'               => $this->resource['postal_code'],
            'country_name'              => $this->resource['country_name'],
            'address_type'              => $this->resource['address_type'],
        ];
    }
}

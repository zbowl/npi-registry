<?php

namespace App\Api\Npi\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaxonomyResource extends JsonResource
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
            'code' => $this->resource['code'],
            'license' => $this->resource['license'],
            'state' => $this->resource['state'],
            'primary' => $this->resource['primary'],
            'desc' => $this->resource['desc'],
            'group' => $this->resource['taxonomy_group'],
        ];
    }
}

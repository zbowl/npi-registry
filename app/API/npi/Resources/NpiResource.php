<?php

namespace App\Api\Npi\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NpiResource extends JsonResource
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
            'number' => $this->resource['number'],
            'enumeration_type' => $this->resource['enumeration_type'],
            'created_epoch' => $this->resource['created_epoch'],
            'last_updated_epoch' => $this->resource['last_updated_epoch'],

            'organization_name' => $this->resource['basic']['organization_name'] ?? null,
            'ein' => $this->resource['basic']['ein'] ?? null,
            'name_prefix' => $this->resource['basic']['name_prefix'] ?? null,
            'first_name' => $this->resource['basic']['first_name'] ?? null,
            'middle_name' => $this->resource['basic']['middle_name'] ?? null,
            'last_name' => $this->resource['basic']['last_name'] ?? null,
            'name_suffix' => $this->resource['basic']['name_suffix'] ?? null,
            'gender' => $this->resource['basic']['gender'] ?? null,
            'sole_proprietor' => $this->resource['basic']['sole_proprietor'] ?? null,
            'status' => $this->resource['basic']['status'] ?? null,
            'credential' => $this->resource['basic']['credential'] ?? null,
            'deactivation_date' => $this->resource['basic']['deactivation_date'] ?? null,
            'reactivation_date' => $this->resource['basic']['reactivation_date'] ?? null,
            'authorized_official_last_name' => $this->resource['basic']['authorized_official_last_name'] ?? null,
            'authorized_official_first_name' => $this->resource['basic']['authorized_official_first_name'] ?? null,
            'authorized_official_middle_name' => $this->resource['basic']['authorized_official_middle_name'] ?? null,
            'authorized_official_title_or_position' => $this->resource['basic']['authorized_official_title_or_position'] ?? null,
            'authorized_official_telephone_number' => $this->resource['basic']['authorized_official_telephone_number'] ?? null,
            'authorized_official_name_prefix' => $this->resource['basic']['authorized_official_name_prefix'] ?? null,
            'authorized_official_name_suffix' => $this->resource['basic']['authorized_official_name_suffix'] ?? null,
            'authorized_official_credential' => $this->resource['basic']['authorized_official_credential'] ?? null,
            'certification_date' => $this->resource['basic']['certification_date'] ?? null,
            'organizational_subpart' => $this->resource['basic']['organizational_subpart'] ?? null,
            'parent_organization_legal_business_name' => $this->resource['basic']['parent_organization_legal_business_name'] ?? null,
            'parent_organization_ein' => $this->resource['basic']['parent_organization_ein'] ?? null,
            'enumeration_date' => $this->resource['basic']['enumeration_date'],
            'last_updated' => $this->resource['basic']['last_updated'],
            'replacement_npi' => $this->resource['basic']['replacement_npi'] ?? null,

            'practiceLocationAddress' => AddressResource::make($this->resource['addresses'][0])->resolve(),
            'mailingAddress' => AddressResource::make($this->resource['addresses'][1])->resolve(),

            'taxonomies' => TaxonomyResource::collection($this->resource['taxonomies'])->toArray($request),
            'identifiers' => IdentifierResource::collection($this->resource['identifiers'])->toArray($request),
            'endpoints' => EndpointResource::collection($this->resource['endpoints'])->toArray($request),
            'other_names' => OtherNameResource::collection($this->resource['other_names'])->toArray($request),
            'practice_locations' => PracticeLocationResource::collection($this->resource['practiceLocations'])->toArray($request),
        ];
    }
}

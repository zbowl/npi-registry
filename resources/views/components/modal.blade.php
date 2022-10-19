<div x-data="{
        isModalOpen: false
    }"
     @keydown.escape="isModalOpen = false"
>

    <button type="button" class="p-1 text-white bg-purple-800 hover:bg-purple-600 rounded" @click="isModalOpen = true">
        Modal
    </button>
    <!-- overlay -->
    <div
        class="overflow-auto"
        style="background-color: rgba(0,0,0,0.5)"
        x-show="isModalOpen"
        :class="{ 'absolute inset-0 z-10 flex items-start justify-center': isModalOpen }"
    >
        <!-- dialog -->
        <div
            class="w-6/12 bg-white shadow-2xl m-4 sm:m-8"
            x-show="isModalOpen"
            @click.away="isModalOpen = false"
            x-cloak
        >
            <div class="flex justify-between items-center border-b p-2 text-xl">
                <h6 class="text-xl font-bold">View NPI Registery: {{ $result['number'] }}</h6>
                <button type="button"
                        class="p-2 text-white bg-rose-700 rounded"
                        @click="isModalOpen = false">
                    &times;
                </button>
            </div>
            <div class="p-2">
                <!-- content -->
                <div class="flex-auto px-4 lg:px-10 py-10 pt-6">
                    <h2>
                        @if(isset($result['basic']['name_prefix']) && $result['basic']['name_prefix'] !== '--')
                            {{ $result['basic']['name_prefix'] }}
                        @endif
                        {{ $result['basic']['first_name'] ?? '' }} {{ $result['basic']['middle_name'] ?? '' }} {{ $result['basic']['last_name'] ?? '' }}
                        @if(isset($result['basic']['name_suffix']) && $result['basic']['name_suffix'] !== '--')
                            {{ $result['basic']['name_suffix'] }}
                        @endif
                        <br>
                        @if(isset($result['basic']['gender']))
                            Gender: @switch($result['basic']['gender'])
                                @case('F')
                                    Female
                                    @break
                                @case('M')
                                    Male
                                    @break
                                @default
                                    {{ $result['basic']['gender'] }}
                            @endswitch
                        @endif
                    </h2>
                    <table class="table-auto">
                        <thead>
                        <tr>
                            <th class="w-1/12 h-full px-6 py-3 border-b-teal-600 border-gray-200 bg-gray-50 text-left leading-4 font-medium text-gray-500 uppercase focus:outline-none">
                                Name
                            </th>
                            <th class="w-1/12 h-full px-6 py-3 border-b-teal-600 border-gray-200 bg-gray-50 text-left leading-4 font-medium text-gray-500 uppercase focus:outline-none">
                                Value
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">

                            </td>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">

                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                NPI
                            </td>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                {{ $result['number'] }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                Enumeration Date
                            </td>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                {{ $result['basic']['enumeration_date'] }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                NPI Type
                            </td>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                @switch($result['enumeration_type'])
                                    @case('NPI-1')
                                        {{ $result['enumeration_type'] }} Individual
                                        @break
                                    @case('NPI-2')
                                        {{ $result['enumeration_type'] }} Organization
                                        @break
                                @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                Sole Proprietor
                            </td>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                {{ $result['basic']['sole_proprietor'] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                Status
                            </td>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                @switch($result['basic']['status'])
                                    @case('A')
                                        Active
                                        @break
                                    @default()
                                        {{ $result['basic']['status'] }}
                                @endswitch
                            </td>
                        </tr>
                        @if(count($result['addresses']) > 1)
                            @foreach($result['addresses'] as $addresses)
                                <tr class="p-2">
                                    @if($addresses['address_purpose'] === 'MAILING')
                                        <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                            Mailing Address
                                        </td>
                                        <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                            {{ $addresses['address_1'] ?? '' }}
                                            <br>{{ $addresses['address_2'] ?? ''}}
                                            <br>{{ $addresses['city'] ?? '' }} {{ $addresses['state'] ?? '' }} {{ $addresses['postal_code'] ?? '' }}
                                            <br>
                                            {{ $addresses['country_name'] ?? '' }}
                                            <br>
                                            Phone: {{ $addresses['telephone_number'] ?? ''}} |
                                            Fax: {{ $addresses['fax_number'] ?? '' }}
                                        </td>
                                    @elseif($addresses['address_purpose'] === 'PRIMARY')
                                        <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                            Primary Practice
                                        </td>
                                        <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                            {{ $addresses['address_1'] ?? '' }}
                                            <br>{{ $addresses['address_2'] ?? ''}}
                                            <br>{{ $addresses['city'] ?? '' }} {{ $addresses['state'] ?? '' }} {{ $addresses['postal_code'] ?? '' }}
                                            <br>
                                            {{ $addresses['country_name'] ?? '' }}
                                            <br>
                                            Phone: {{ $addresses['telephone_number'] ?? ''}} |
                                            Fax: {{ $addresses['fax_number'] ?? '' }}
                                            <br>
                                        </td>
                                    @elseif($addresses['address_purpose'] === 'SECONDARY')
                                        <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                            Secondary Practice
                                        </td>
                                        <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                            {{ $addresses['address_1'] ?? '' }}
                                            <br>{{ $addresses['address_2'] ?? ''}}
                                            <br>{{ $addresses['city'] ?? '' }} {{ $addresses['state'] ?? '' }} {{ $addresses['postal_code'] ?? '' }}
                                            <br>
                                            {{ $addresses['country_name'] ?? '' }}
                                            <br>
                                            Phone: {{ $addresses['telephone_number'] ?? ''}} |
                                            Fax: {{ $addresses['fax_number'] ?? '' }}
                                        </td>
                                    @else
                                        <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                            Location
                                        </td>
                                        <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                            {{ $addresses['address_1'] ?? '' }}
                                            <br>{{ $addresses['address_2'] ?? ''}}
                                            <br>{{ $addresses['city'] ?? '' }} {{ $addresses['state'] ?? '' }} {{ $addresses['postal_code'] ?? '' }}
                                            <br>
                                            {{ $addresses['country_name'] ?? '' }}
                                            <br>
                                            Phone: {{ $addresses['telephone_number'] ?? ''}} |
                                            Fax: {{ $addresses['fax_number'] ?? '' }}
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                        <tr>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                Health Information Exchange
                            </td>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                <table class="border border-gray-600">
                                    <thead class="font-bold">
                                    <tr>
                                        <th>Endpoint Type</th>
                                        <th>Endpoint</th>
                                        <th>Endpoint Description</th>
                                        <th>Use</th>
                                        <th>Content Type</th>
                                        <th>Affiliation</th>
                                        <th>Endpoint Location</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                Other Identifiers
                            </td>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                <table class="border border-gray-600">
                                    <thead class="font-bold">
                                    <tr>
                                        <th>Issuer</th>
                                        <th>State</th>
                                        <th>Number</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                Taxonomy
                            </td>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                <table class="border border-gray-600">
                                    <thead class="font-bold">
                                    <tr>
                                        <th>Primary Taxonomy</th>
                                        <th>Selected Taxonomy</th>
                                        <th>State</th>
                                        <th>License Number</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

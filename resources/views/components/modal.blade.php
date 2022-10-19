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
                <h6 class="text-xl font-bold">Provider: {{ $result['number'] }}</h6>
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
                        @if(isset($result['name_prefix']) && $result['name_prefix'] !== '--')
                            {{ $result['name_prefix'] }}
                        @endif
                        {{ $result['first_name'] ?? '' }} {{ $result['middle_name'] ?? '' }} {{ $result['last_name'] ?? '' }}
                        @if(isset($result['name_suffix']) && $result['name_suffix'] !== '--')
                            {{ $result['name_suffix'] }}
                        @endif
                        <br>
                        @if(isset($result['gender']))
                            Gender: @switch($result['gender'])
                                @case('F')
                                    Female
                                    @break
                                @case('M')
                                    Male
                                    @break
                                @default
                                    {{ $result['gender'] }}
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
                                {{ $result['enumeration_date'] }}
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
                                {{ $result['sole_proprietor'] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                Status
                            </td>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                @switch($result['status'])
                                    @case('A')
                                        Active
                                        @break
                                    @default()
                                        {{ $result['status'] }}
                                @endswitch
                            </td>
                        </tr>
                        <tr class="p-2">
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                Mailing Address
                            </td>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                {{ $result['mailingAddress']['address_1'] ?? '' }}
                                <br>{{ $result['mailingAddress']['address_2'] ?? ''}}
                                <br>{{ $result['mailingAddress']['city'] ?? '' }} {{ $result['mailingAddress']['state'] ?? '' }} {{ $result['mailingAddress']['postal_code'] ?? '' }}
                                <br>
                                {{ $result['mailingAddress']['country_name'] ?? '' }}
                                <br>
                                Phone: {{ $result['mailingAddress']['telephone_number'] ?? ''}} |
                                Fax: {{ $result['mailingAddress']['fax_number'] ?? '' }}
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                Primary Practice
                            </td>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                {{ $result['practiceLocationAddress']['address_1'] ?? '' }}
                                <br>{{ $result['practiceLocationAddress']['address_2'] ?? ''}}
                                <br>{{ $result['practiceLocationAddress']['city'] ?? '' }} {{ $result['practiceLocationAddress']['state'] ?? '' }} {{ $result['practiceLocationAddress']['postal_code'] ?? '' }}
                                <br>
                                {{ $result['practiceLocationAddress']['country_name'] ?? '' }}
                                <br>
                                Phone: {{ $result['practiceLocationAddress']['telephone_number'] ?? ''}} |
                                Fax: {{ $result['practiceLocationAddress']['fax_number'] ?? '' }}
                                <br>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                Secondary Practice
                            </td>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">

                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                Health Information Exchange
                            </td>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                <table class="table-auto">
                                    <thead class="font-bold">
                                    <tr>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            Endpoint Type
                                        </th>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            Endpoint
                                        </th>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            Endpoint Description
                                        </th>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            Use
                                        </th>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            Content Type
                                        </th>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            Affiliation
                                        </th>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            Endpoint Location
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($result['endpoints'] as $endpoint)
                                            <td class="p-1 border border-gray-600 text-left text-black">
                                                {{ $endpoint['endpointType'] ?? ''}}
                                            </td>
                                            <td class="p-1 border border-gray-600 text-left text-black">
                                                {{ $endpoint['endpoint'] ?? '' }}
                                            </td>
                                            <td class="p-1 border border-gray-600 text-left text-black">
                                                {{ $endpoint['endpointDescription'] ?? '' }}
                                            </td>
                                            <td class="p-1 border border-gray-600 text-left text-black">
                                                {{ $endpoint['use'] ?? '' }}
                                            </td>
                                            <td class="p-1 border border-gray-600 text-left text-black">
                                                {{ $endpoint['contentType'] ?? '' }}
                                            </td>
                                            <td class="p-1 border border-gray-600 text-left text-black">
                                                {{ $endpoint['affiliation'] ?? '' }}
                                            </td>
                                            <td class="p-1 border border-gray-600 text-left text-black">
                                                {{ $endpoint['endpointType']['address_1'] ?? '' }}
                                                <br>{{ $endpoint['endpointType']['address_2'] ?? ''}}
                                                <br>{{ $endpoint['endpointType']['city'] ?? '' }} {{ $endpoint['endpointType']['state'] ?? '' }} {{ $endpoint['endpointType']['postal_code'] ?? '' }}
                                                <br>
                                                {{ $endpoint['endpointType']['country_name'] ?? '' }}
                                                <br>
                                            </td>
                                        @endforeach
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
                                <table class="table-auto">
                                    <thead class="font-bold">
                                    <tr>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            Id
                                        </th>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            Code
                                        </th>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            State
                                        </th>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            Issuer
                                        </th>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            Description
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($result['identifiers'] as $identifier)
                                        <tr>
                                            <td class="p-1 border border-gray-600 text-left text-black">
                                                {{ $identifier['identifier'] }}
                                            </td>
                                            <td class="p-1 border border-gray-600 text-left text-black">
                                                {{ $identifier['code'] }}
                                            </td>
                                            <td class="p-1 border border-gray-600 text-left text-black">
                                                {{ $identifier['state'] }}
                                            </td>
                                            <td class="p-1 border border-gray-600 text-left text-black">
                                                {{ $identifier['issuer'] }}
                                            </td>
                                            <td class="p-1 border border-gray-600 text-left text-black">
                                                {{ $identifier['desc'] }}
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                Taxonomy
                            </td>
                            <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                <table class="table-auto">
                                    <thead class="font-bold">
                                    <tr>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            Code
                                        </th>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            License Number
                                        </th>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            State
                                        </th>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            Primary
                                        </th>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            Description
                                        </th>
                                        <th class="p-2 border border-gray-600 text-left text-black">
                                            Group
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($result['taxonomies'] as $taxonomy)
                                        <tr>
                                            <td class="p-2 border border-gray-600 text-left text-black">
                                                {{ $taxonomy['code'] }}
                                            </td>
                                            <td class="p-2 border border-gray-600 text-left text-black">
                                                {{ $taxonomy['license'] ?? '' }}
                                            </td>
                                            <td class="p-2 border border-gray-600 text-left text-black">
                                                {{ $taxonomy['state'] }}
                                            </td>
                                            <td class="p-2 border border-gray-600 text-left text-black">
                                                {{ $taxonomy['primary'] }}
                                            </td>
                                            <td class="p-2 border border-gray-600 text-left text-black">
                                                {{ $taxonomy['desc'] }}
                                            </td>
                                            <td class="p-2 border border-gray-600 text-left text-black">
                                                {{ $taxonomy['group'] }}
                                            </td>
                                        </tr>
                                    @endforeach
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

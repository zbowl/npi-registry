<div
    x-data="{
    }">
    <div class="grid lg:grid-cols-2 grid-cols-1 gap-2">
        <div>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                @if($resultErrors)
                    <div class="bg-red-100 rounded-lg py-5 px-6 mb-4 text-base text-red-700 mb-3">
                        <button type="button" @click="$wire.closeError()">×</button>
                        <strong>{{ $resultErrors }}</strong>
                    </div>
                @endif
                <div class="grid grid-cols-1 gap-3">
                    <form id="npiRegistrySearch" class="" wire:submit.prevent="search">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-5 mt-3 mx-7">
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">NPI
                                    Number</label>
                                <input
                                    wire:model="queryParameters.number"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text"/>
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">First
                                    Name</label>
                                <input
                                    wire:model="queryParameters.first_name"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text"/>
                            </div>
                            <div class="grid grid-cols-1">
                                <label
                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Zip</label>
                                <input
                                    wire:model="queryParameters.postal_code"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text"/>
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Last
                                    Name</label>
                                <input
                                    wire:model="queryParameters.last_name"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text"/>
                            </div>
                            <div class="grid grid-cols-1">
                                <label
                                    class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">City</label>
                                <input
                                    wire:model="queryParameters.city"
                                    class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    type="text"/>
                            </div>

                        </div>
                        <div class="grid grid-cols-1 mt-5 mx-7">
                            <label
                                class="uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Description</label>
                            <textarea
                                class="py-2 px-3 rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                type="text"></textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-3 gap-3 md:gap-5 mt-2 mx-7">
                            <div class="grid grid-cols-1">
                                <label
                                    class="py-2 uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Type</label>
                                <select
                                    class="rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    wire:model="queryParameters.enumerationType">
                                    <option>Any</option>
                                    @foreach($enumerationTypes as $key => $value)
                                        <option wire:key="enumeration_type{{ $loop->index }}"
                                                value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-1">
                                <label
                                    class="py-2 uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">State</label>
                                <select
                                    class="rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    wire:model="queryParameters.state">
                                    <option>Any</option>
                                    @foreach($states as $state)
                                        <option wire:key="{{ $loop->index }}"
                                                value="{{ $state['state_abbreviation'] }}">{{ $state['state_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-1">
                                <label
                                    class="py-2 uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Country</label>
                                <select
                                    class="rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    wire:model="queryParameters.country_code">
                                    <option>Any</option>
                                    @foreach($countries as $country)
                                        <option wire:key="{{ $loop->index }}"
                                                value="{{ $country['country_abbreviation'] }}">{{ $country['country_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="grid grid-cols-1">
                                <label class="py-2 uppercase md:text-sm text-xs text-gray-500 text-light font-semibold">Address
                                    Type</label>
                                <select
                                    class="rounded-lg border-2 border-purple-300 mt-1 focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
                                    wire:model="queryParameters.address_purpose">
                                    <option>Any</option>
                                    @foreach($addressPurposes as $key => $value)
                                        <option wire:key="{{ $loop->index }}" value="{{ $value }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="flex items-center justify-center md:gap-8 gap-4 pt-8 pb-2">
                            <button
                                class="w-auto bg-gray-500 hover:bg-gray-700 rounded-lg shadow-xl font-medium text-white px-4 py-2">
                                Cancel
                            </button>
                            <button
                                class="w-auto bg-purple-500 hover:bg-purple-700 rounded-lg shadow-xl font-medium text-white px-4 py-2">
                                Search
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
        <div>
            @if($results)
                <div class="pt-3">
                    <table class="table-auto">
                        <thead class="align-middle">
                        <tr class="divide-x divide-blue-300">
                            <th class="w-1/12 h-full px-6 py-3 border-b-teal-600 border-gray-200 bg-gray-50 text-left leading-4 font-medium text-gray-500 uppercase focus:outline-none">
                                Full Name
                            </th>
                            <th class="w-1/12 h-full px-6 py-3 border-b-teal-600 border-gray-200 bg-gray-50 text-left leading-4 font-medium text-gray-500 uppercase focus:outline-none">
                                Number
                            </th>
                            <th class="w-1/12 h-full px-6 py-3 border-b-teal-600 border-gray-200 bg-gray-50 text-left leading-4 font-medium text-gray-500 uppercase focus:outline-none">
                                NPI Profile
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($results['results'] as $index => $result)
                            <tr
                                wire:key="result-row-{{ $index }}"
                                id="result-row-{{ $index }}"
                            >
                                <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                    @if(isset($result['basic']['first_name']))
                                        {{ $result['basic']['first_name'] . ' ' . $result['basic']['last_name'] }}
                                    @else
                                        {{ $result['basic']['organization_name'] }}
                                    @endif
                                </td>
                                <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                    {{ $result['number'] }}
                                </td>
                                <td class="px-6 py-2 border border-teal-600 bg-blue-200 text-left text-black">
                                    <div class="flex gap-2">
                                        <div class="flex">
                                            <a class="p-1 text-white bg-red-800 hover:bg-red-600 rounded"
                                               href="https://npiregistry.cms.hhs.gov/provider-view/{{ $result['number'] }}"
                                               target="_blank">NPI</a>
                                        </div>
                                        <div class="flex">
                                            <x-modal :index="$index" :result="$result"/>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>

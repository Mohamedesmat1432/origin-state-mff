<div>
    @can('show-origin')
    <x-dialog-modal wire:model="show_modal" max-width="5xl" method="GET">
        @if ($show_modal)
        <x-slot name="title">
            {{ __('site.show_origin') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-1">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="project_id" value="{{ __('site.project_id') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->project?->name }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="decision_num"
                            value="{{ __('site.decision_num') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->decision_num }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="decision_date"
                            value="{{ __('site.decision_date') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->decision_date }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="decision_type_id"
                            value="{{ __('site.decision_type_id') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->decisionType?->name }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="total_area_allocated"
                            value="{{ __('site.total_area_allocated') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->total_area_allocated }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="total_area_coords"
                            value="{{ __('site.total_area_coords') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->total_area_coords }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="government_id"
                            value="{{ __('site.government_id') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->government?->name }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="city_id" value="{{ __('site.city_id') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->city?->name }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="location" value="{{ __('site.location') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->location }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="used_area" value="{{ __('site.used_area') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->used_area }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="executing_entity_num"
                            value="{{ __('site.executing_entity_num') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->executing_entity_num }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="available_area"
                            value="{{ __('site.available_area') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->available_area }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="vacant_buildings"
                            value="{{ __('site.vacant_buildings') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->vacant_buildings }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="remaining_area"
                            value="{{ __('site.remaining_area') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->remaining_area }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="location_status"
                            value="{{ __('site.location_status') }}" />
                        <div class="mt-1 block w-full">
                            <span class="rounded {{ $this->origin->location_status->color() }}">
                                {{ $this->origin->location_status->label() }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="origin_status"
                            value="{{ __('site.origin_status') }}" />
                        <div class="mt-1 block w-full">
                            <span class="rounded {{ $this->origin->origin_status->color() }}">
                                {{ $this->origin->origin_status->label() }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="record_status"
                            value="{{ __('site.record_status') }}" />
                        <div class="mt-1 block w-full">
                            <span class="rounded {{ $this->origin->record_status->color() }}">
                                {{ $this->origin->record_status->label() }}
                            </span>
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="created_by" value="{{ __('site.created_by') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->createdBy?->name ?? __('site.no_data_found') }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="revised_by" value="{{ __('site.revised_by') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->revisedBy?->name ?? __('site.no_data_found') }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="completed_by"
                            value="{{ __('site.completed_by') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->completedBy?->name ?? __('site.no_data_found') }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="coordinated_by"
                            value="{{ __('site.coordinated_by') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->coordinatedBy?->name ?? __('site.no_data_found') }}
                        </div>
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="notes" value="{{ __('site.notes') }}" />
                        <div class="mt-1 block w-full">
                            {{ $this->origin->notes }}
                        </div>
                    </div>
                </div>

                <div class="gap-x-4">
                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="details" value="{{ __('site.details') }}" />

                        @if (!empty($this->origin->details?->toArray()))
                        <x-table>
                            <x-slot name="thead">
                                <tr>
                                    <td class="px-4 py-2 border">
                                        <div class="flex justify-center">
                                            {{ __('site.statement_id') }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <div class="flex justify-center">
                                            {{ __('site.used_area') }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <div class="flex justify-center">
                                            {{ __('site.unit_area') }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <div class="flex justify-center">
                                            {{ __('site.number_of_buildings_executed') }}

                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <div class="flex justify-center">
                                            {{ __('site.number_of_units') }}

                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <div class="flex justify-center">
                                            {{ __('site.residential_units') }}

                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <div class="flex justify-center">
                                            {{ __('site.administrative_units') }}

                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <div class="flex justify-center">
                                            {{ __('site.commercial_units') }}

                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <div class="flex justify-center">
                                            {{ __('site.commercial_shops') }}

                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <div class="flex justify-center">
                                            {{ __('site.notes') }}

                                        </div>
                                    </td>
                                </tr>
                            </x-slot>
                            <x-slot name="tbody">
                                @foreach ($this->origin->details as $detail)
                                <tr wire:key="detail-{{ $detail->id }}" class="odd:bg-gray-100">
                                    <td class="p-2 border">
                                        {{ $detail->statement?->name }}
                                    </td>
                                    <td class="p-2 border">
                                        {{ $detail->used_area }}
                                    </td>
                                    <td class="p-2 border">
                                        {{ $detail->unit_area }}
                                    </td>
                                    <td class="p-2 border">
                                        {{ $detail->number_of_buildings_executed }}
                                    </td>
                                    <td class="p-2 border">
                                        {{ $detail->number_of_units }}
                                    </td>
                                    <td class="p-2 border">
                                        {{ $detail->residential_units }}
                                    </td>
                                    <td class="p-2 border">
                                        {{ $detail->administrative_units }}
                                    </td>
                                    <td class="p-2 border">
                                        {{ $detail->commercial_units }}
                                    </td>
                                    <td class="p-2 border">
                                        {{ $detail->commercial_shops }}
                                    </td>
                                    <td class="p-2 border">
                                        {{ $detail->note }}
                                    </td>
                                </tr>
                                @endforeach
                            </x-slot>
                        </x-table>
                        @else
                        <div class="mt-2">
                            {{ __('site.no_data_found') }}
                        </div>
                        @endif
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="details" value="{{ __('site.sepated_services') }}" />

                        @if (!empty($this->origin->services?->toArray()))
                        <x-table>
                            <x-slot name="thead">
                                <tr>
                                    <td class="px-4 py-2 border">
                                        <div class="flex justify-center">
                                            {{ __('site.type_service_id') }}
                                        </div>
                                    </td>
                                    <td class="px-4 py-2 border">
                                        <div class="flex justify-center">
                                            {{ __('site.count') }}
                                        </div>
                                    </td>
                                </tr>
                            </x-slot>
                            <x-slot name="tbody">
                                @foreach ($this->origin->services as $service)
                                <tr wire:key="service-{{ $service->id }}" class="odd:bg-gray-100">
                                    <td class="p-2 border">
                                        {{ $service->typeService?->name }}
                                    </td>
                                    <td class="p-2 border">
                                        {{ $service->count }}
                                    </td>
                                </tr>
                                @endforeach
                            </x-slot>
                        </x-table>
                        @else
                        <div class="mt-2">
                            {{ __('site.no_data_found') }}
                        </div>
                        @endif
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="coordinates"
                            value="{{ __('site.coordinates') }}" />

                        @if (!empty($coordinates))
                        <div x-data="mapComponent(@entangle('map_government'), @entangle('map_city'), @js($coordinates), @entangle('total_area_coords'))"
                            x-init="init();
                                    Livewire.hook('message.processed', () => run())">
                            <div class="relative w-full" wire:ignore>
                                <div id="map" x-ref="map" class="h-96 rounded my-2"></div>
                            </div>
                        </div>
                        @else
                        <div class="mt-2">
                            {{ __('site.no_data_found') }}
                        </div>
                        @endif
                    </div>

                    <div class="mt-2">
                        <x-label class="font-extrabold text-lg" for="decision_image"
                            value="{{ __('site.decision_image') }}" />
                        @php
                        $file = Helper::getFilePreviewDetails($this->origin->decision_image);
                        @endphp

                        @if ($file)
                        <div class="mt-2 flex items-center">
                            <img src="{{ $file['iconUrl'] }}" alt="{{ $file['extension'] }} Icon" class="w-8 h-8 mr-2">
                            <span class="truncate max-w-xs" title="{{ $file['fileName'] }}">
                                {{ $file['fileName'] }}
                            </span>
                        </div>

                        @if ($file['isPdf'])
                        <div class="mt-2">
                            <iframe src="{{ $file['fileUrl'] }}" width="100%" height="600px"
                                class="border rounded shadow"></iframe>
                        </div>
                        @endif

                        @if ($file['isImage'])
                        <div class="mt-2">
                            <img src="{{ $file['fileUrl'] }}" alt="Preview of Uploaded" width="100%" height="600px">
                        </div>
                        @endif
                        @else
                        <div class="mt-2">
                            {{ __('site.no_data_found') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button class="mx-2" wire:click="$set('show_modal',false)" wire:loading.attr="disabled">
                {{ __('site.cancel') }}
            </x-secondary-button>
        </x-slot>
        @endif
    </x-dialog-modal>
    @endcan
</div>
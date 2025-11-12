<div>
    @can('show-origin')
        <x-dialog-modal wire:model="show_modal" max-width="5xl" method="GET">
            @if ($show_modal)
                <x-slot name="title">
                    {{ __('site.show_origin') }}
                </x-slot>

                <x-slot name="content">

                    {{-- BASIC INFO --}}
                    <h3 class="font-bold text-lg mt-4 mb-2 text-center">{{ __('site.basic_info') }}</h3>
                    <x-table>
                        <x-slot name="thead">
                            <tr class="bg-gray-100">
                                <td class="px-4 py-2 border">{{ __('site.project_id') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.decision_type_id') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.decision_num') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.decision_date') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.government') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.city') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.location') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.notes') }}</td>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            <tr>
                                <td class="px-4 py-2 border">{{ $this->origin->project?->name ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $this->origin->decisionType?->name ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $this->origin->decision_num ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $this->origin->decision_date ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $this->origin->government?->name ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $this->origin->city?->name ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $this->origin->location ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $this->origin->notes ?? '-' }}</td>
                            </tr>
                        </x-slot>
                    </x-table>

                    {{-- STATUS & USERS INFO --}}
                    <h3 class="font-bold text-lg mt-4 mb-2 text-center">{{ __('site.statuses_info') }}</h3>
                    <x-table>
                        <x-slot name="thead">
                            <tr class="bg-gray-100">
                                <td class="px-4 py-2 border">{{ __('site.origin_status') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.location_status') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.record_status') }}</td>
                                {{-- <td class="px-4 py-2 border">{{ __('site.created_by') }}</td>
                        <td class="px-4 py-2 border">{{ __('site.revised_by') }}</td>
                        <td class="px-4 py-2 border">{{ __('site.completed_by') }}</td>
                        <td class="px-4 py-2 border">{{ __('site.coordinated_by') }}</td> --}}
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            <tr>
                                <td class="px-4 py-2 border">
                                    <span class="{{ $this->origin->origin_status?->color() }}">
                                        {{ $this->origin->origin_status?->label() }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 border">
                                    <span class="{{ $this->origin->location_status?->color() }}">
                                        {{ $this->origin->location_status?->label() }}
                                    </span>
                                </td>
                                <td class="px-4 py-2 border">
                                    <span class="{{ $this->origin->record_status?->color() }}">
                                        {{ $this->origin->record_status?->label() }}
                                    </span>
                                </td>
                                {{-- <td class="px-4 py-2 border">
                                    {{ $this->origin->createdBy?->name ?? __('site.no_data_found') }}
                                </td>
                                <td class="px-4 py-2 border">
                                    {{ $this->origin->revisedBy?->name ?? __('site.no_data_found') }}
                                </td>
                                <td class="px-4 py-2 border">
                                    {{ $this->origin->completedBy?->name ?? __('site.no_data_found') }}
                                </td>
                                <td class="px-4 py-2 border">
                                    {{ $this->origin->coordinatedBy?->name ?? __('site.no_data_found') }}
                                </td> --}}
                            </tr>
                        </x-slot>
                    </x-table>

                    {{-- AREA INFO --}}
                    <h3 class="font-bold text-lg mt-4 mb-2 text-center">{{ __('site.area_info') }}</h3>
                    <x-table>
                        <x-slot name="thead">
                            <tr class="bg-gray-100">
                                <td class="px-4 py-2 border">{{ __('site.total_area_allocated') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.total_area_coords') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.used_area') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.executing_entity_num') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.remaining_area') }}</td>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            <tr>
                                <td class="px-4 py-2 border">{{ $this->origin->total_area_allocated ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $this->origin->total_area_coords ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $this->origin->used_area ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $this->origin->executing_entity_num ?? '-' }}</td>
                                <td class="px-4 py-2 border">{{ $this->origin->remaining_area ?? '-' }}</td>
                            </tr>
                        </x-slot>
                    </x-table>

                    {{-- DETAILS --}}
                    <h3 class="font-bold text-lg mt-4 mb-2 text-center">{{ __('site.details') }}</h3>
                    <x-table>
                        <x-slot name="thead">
                            <tr class="bg-gray-100">
                                <td class="px-4 py-2 border">{{ __('site.statement_id') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.unit_area') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.number_of_buildings_executed') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.number_of_units') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.residential_units') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.administrative_units') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.commercial_units') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.commercial_shops') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.notes') }}</td>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            @forelse($this->origin->details as $detail)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $detail->statement?->name ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $detail->unit_area ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $detail->number_of_buildings_executed ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $detail->number_of_units ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $detail->residential_units ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $detail->administrative_units ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $detail->commercial_units ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $detail->commercial_shops ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $detail->note ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="px-4 py-2 border text-center">{{ __('site.no_data_found') }}
                                    </td>
                                </tr>
                            @endforelse
                        </x-slot>
                    </x-table>

                    {{-- SERVICES --}}
                    <h3 class="font-bold text-lg mt-4 mb-2 text-center">{{ __('site.services') }}</h3>
                    <x-table>
                        <x-slot name="thead">
                            <tr class="bg-gray-100">
                                <td class="px-4 py-2 border">{{ __('site.type_service_id') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.used_area') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.count') }}</td>
                                <td class="px-4 py-2 border">{{ __('site.note') }}</td>
                            </tr>
                        </x-slot>
                        <x-slot name="tbody">
                            @forelse($this->origin->services as $service)
                                <tr>
                                    <td class="px-4 py-2 border">{{ $service->typeService?->name ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $service->used_area ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $service->count ?? '-' }}</td>
                                    <td class="px-4 py-2 border">{{ $service->note ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="px-4 py-2 border text-center">{{ __('site.no_data_found') }}
                                    </td>
                                </tr>
                            @endforelse
                        </x-slot>
                    </x-table>

                    {{-- COORDINATES MAP --}}
                    <h3 class="font-bold text-lg mt-4 mb-2 text-center">{{ __('site.coordinates') }}</h3>
                    <div class="text-center">
                        @if (!empty($coordinates))
                            <div x-data="mapComponent(
                                @entangle('map_government'),
                                @entangle('map_city'),
                                @js($coordinates),
                                @entangle('total_area_coords')
                            )" x-init="init();
                            Livewire.hook('message.processed', () => run())">
                                <div class="relative w-full" wire:ignore>
                                    <div id="map" x-ref="map" class="h-96 rounded my-2"></div>
                                </div>
                            </div>
                        @else
                            <div class="mt-2">{{ __('site.no_data_found') }}</div>
                        @endif
                    </div>

                    {{-- DECISION IMAGE / FILE PREVIEW --}}
                    <h3 class="font-bold text-lg mt-4 mb-2 text-center">{{ __('site.decision_image') }}</h3>
                    <div class="text-center">
                        @php
                            $file = Helper::getFilePreviewDetails($this->origin->decision_image);
                        @endphp

                        @if ($file)
                            <div class="mt-2 flex justify-center items-center">
                                <img src="{{ $file['iconUrl'] }}" alt="{{ $file['extension'] }} Icon"
                                    class="w-8 h-8 mr-2">
                                <span class="truncate max-w-xs"
                                    title="{{ $file['fileName'] }}">{{ $file['fileName'] }}</span>
                            </div>

                            @if ($file['isPdf'])
                                <div class="mt-2">
                                    <iframe src="{{ $file['fileUrl'] }}" width="100%" height="600px"
                                        class="border rounded shadow"></iframe>
                                </div>
                            @endif

                            @if ($file['isImage'])
                                <div class="mt-2">
                                    <img src="{{ $file['fileUrl'] }}" alt="Preview of Uploaded" width="100%"
                                        height="600px">
                                </div>
                            @endif
                        @else
                            <div class="mt-2">{{ __('site.no_data_found') }}</div>
                        @endif
                    </div>

                </x-slot>

                <x-slot name="footer">
                    <x-secondary-button class="mx-2" wire:click="$set('show_modal',false)"
                        wire:loading.attr="disabled">
                        {{ __('site.cancel') }}
                    </x-secondary-button>
                </x-slot>
            @endif
        </x-dialog-modal>
    @endcan
</div>

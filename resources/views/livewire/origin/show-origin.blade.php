<div>
    @can('show-origin')
    <x-dialog-modal wire:model="show_modal" max-width="5xl" method="GET">
        @if ($show_modal)
        <x-slot name="title">
            {{ __('site.show_origin') }}
        </x-slot>

        <x-slot name="content">
            {{-- =========================
            BASIC INFO (Horizontal Table)
            ========================== --}}
            <div class="mt-4">
                <x-label class="font-extrabold text-lg text-center block">{{ __('site.basic_info') }}</x-label>

                <table class="w-full border-collapse border border-gray-300 text-sm mt-2 text-center">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">{{ __('site.project_id') }}</th>
                            <th class="border px-4 py-2">{{ __('site.decision_type_id') }}</th>
                            <th class="border px-4 py-2">{{ __('site.decision_num') }}</th>
                            <th class="border px-4 py-2">{{ __('site.decision_date') }}</th>
                            <th class="border px-4 py-2">{{ __('site.government') }}</th>
                            <th class="border px-4 py-2">{{ __('site.city') }}</th>
                            <th class="border px-4 py-2">{{ __('site.location') }}</th>
                            <th class="border px-4 py-2">{{ __('site.notes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">{{ $this->origin->project?->name ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $this->origin->decisionType?->name ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $this->origin->decision_num ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $this->origin->decision_date ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $this->origin->government?->name ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $this->origin->city?->name ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $this->origin->location ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $this->origin->notes ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            {{-- =========================
            STATUS & USERS INFO (Horizontal Table)
            ========================== --}}
            <div class="mt-4">
                <x-label class="font-extrabold text-lg text-center block">{{ __('site.status_users_info') }}</x-label>

                <table class="w-full border-collapse border border-gray-300 text-sm mt-2 text-center">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">{{ __('site.origin_status') }}</th>
                            <th class="border px-4 py-2">{{ __('site.location_status') }}</th>
                            <th class="border px-4 py-2">{{ __('site.record_status') }}</th>
                            <th class="border px-4 py-2">{{ __('site.created_by') }}</th>
                            <th class="border px-4 py-2">{{ __('site.revised_by') }}</th>
                            <th class="border px-4 py-2">{{ __('site.completed_by') }}</th>
                            <th class="border px-4 py-2">{{ __('site.coordinated_by') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">
                                <span class="{{ $this->origin->origin_status?->color() }}">
                                    {{ $this->origin->origin_status?->label() }}
                                </span>
                            </td>
                            <td class="border px-4 py-2">
                                <span class="{{ $this->origin->location_status?->color() }}">
                                    {{ $this->origin->location_status?->label() }}
                                </span>
                            </td>
                            <td class="border px-4 py-2">
                                <span class="{{ $this->origin->record_status?->color() }}">
                                    {{ $this->origin->record_status?->label() }}
                                </span>
                            </td>
                            <td class="border px-4 py-2">
                                {{ $this->origin->createdBy?->name ?? __('site.no_data_found') }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ $this->origin->revisedBy?->name ?? __('site.no_data_found') }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ $this->origin->completedBy?->name ?? __('site.no_data_found') }}
                            </td>
                            <td class="border px-4 py-2">
                                {{ $this->origin->coordinatedBy?->name ?? __('site.no_data_found') }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- =========================
            AREA INFO (Horizontal Table)
            ========================== --}}
            <div class="mt-4">
                <x-label class="font-extrabold text-lg text-center block">{{ __('site.area_info') }}</x-label>

                <table class="w-full border-collapse border border-gray-300 text-sm mt-2 text-center">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">{{ __('site.total_area_allocated') }}</th>
                            <th class="border px-4 py-2">{{ __('site.total_area_coords') }}</th>
                            <th class="border px-4 py-2">{{ __('site.used_area') }}</th>
                            <th class="border px-4 py-2">{{ __('site.executing_entity_num') }}</th>
                            <th class="border px-4 py-2">{{ __('site.available_area') }}</th>
                            <th class="border px-4 py-2">{{ __('site.vacant_buildings') }}</th>
                            <th class="border px-4 py-2">{{ __('site.remaining_area') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border px-4 py-2">{{ $this->origin->total_area_allocated ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $this->origin->total_area_coords ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $this->origin->used_area ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $this->origin->executing_entity_num ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $this->origin->available_area ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $this->origin->vacant_buildings ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $this->origin->remaining_area ?? '-' }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            {{-- =========================
            DETAILS (Horizontal Table)
            ========================== --}}
            <div class="mt-4">
                <x-label class="font-extrabold text-lg text-center block">{{ __('site.details') }}</x-label>

                @if($this->origin->details->isNotEmpty())
                <table class="w-full border-collapse border border-gray-300 text-sm mt-4 text-center">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">{{ __('site.statement_id') }}</th>
                            <th class="border px-4 py-2">{{ __('site.used_area') }}</th>
                            <th class="border px-4 py-2">{{ __('site.unit_area') }}</th>
                            <th class="border px-4 py-2">{{ __('site.number_of_buildings_executed') }}</th>
                            <th class="border px-4 py-2">{{ __('site.number_of_units') }}</th>
                            <th class="border px-4 py-2">{{ __('site.residential_units') }}</th>
                            <th class="border px-4 py-2">{{ __('site.administrative_units') }}</th>
                            <th class="border px-4 py-2">{{ __('site.commercial_units') }}</th>
                            <th class="border px-4 py-2">{{ __('site.commercial_shops') }}</th>
                            <th class="border px-4 py-2">{{ __('site.notes') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($this->origin->details as $detail)
                        <tr>
                            <td class="border px-4 py-2">{{ $detail->statement?->name ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $detail->used_area ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $detail->unit_area ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $detail->number_of_buildings_executed ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $detail->number_of_units ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $detail->residential_units ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $detail->administrative_units ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $detail->commercial_units ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $detail->commercial_shops ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $detail->note ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="mt-2 text-center text-gray-500">{{ __('site.no_data_found') }}</div>
                @endif
            </div>


            {{-- =========================
            SERVICES (Horizontal Table)
            ========================== --}}
            <div class="mt-4">
                <x-label class="font-extrabold text-lg text-center block">{{ __('site.services') }}</x-label>

                @if($this->origin->services->isNotEmpty())
                <table class="w-full border-collapse border border-gray-300 text-sm mt-4 text-center">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="border px-4 py-2">{{ __('site.type_service_id') }}</th>
                            <th class="border px-4 py-2">{{ __('site.count') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($this->origin->services as $service)
                        <tr>
                            <td class="border px-4 py-2">{{ $service->typeService?->name ?? '-' }}</td>
                            <td class="border px-4 py-2">{{ $service->count ?? '-' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <div class="mt-2 text-center text-gray-500">{{ __('site.no_data_found') }}</div>
                @endif
            </div>

            {{-- =========================
            COORDINATES MAP
            ========================== --}}
            <div class="mt-4 text-center">
                <x-label class="font-extrabold text-lg text-center block">{{ __('site.coordinates') }}</x-label>
                @if (!empty($coordinates))
                <div x-data="mapComponent(
                        @entangle('map_government'),
                        @entangle('map_city'),
                        @js($coordinates),
                        @entangle('total_area_coords')
                    )" x-init="init(); Livewire.hook('message.processed', () => run())">
                    <div class="relative w-full" wire:ignore>
                        <div id="map" x-ref="map" class="h-96 rounded my-2"></div>
                    </div>
                </div>
                @else
                <div class="mt-2">{{ __('site.no_data_found') }}</div>
                @endif
            </div>

            {{-- =========================
            DECISION IMAGE / FILE PREVIEW
            ========================== --}}
            <div class="mt-4 text-center">
                <x-label class="font-extrabold text-lg text-center block">{{ __('site.decision_image') }}</x-label>
                @php
                $file = Helper::getFilePreviewDetails($this->origin->decision_image);
                @endphp

                @if ($file)
                <div class="mt-2 flex justify-center items-center">
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
                <div class="mt-2">{{ __('site.no_data_found') }}</div>
                @endif
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
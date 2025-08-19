<div>
    @can('create-origin')
        <x-dialog-modal wire:model="create_modal" submit="save()" method="POST" max-width="5xl">
            @if ($this->create_modal)
                <x-slot name="title">
                    {{ __('site.create_origin') }}
                </x-slot>

                <x-slot name="content">
                    <div class="grid grid-cols-1 md:grid-cols-1 gap-4">

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <x-form.dynamic-select label="{{ __('site.project_id') }}" model="project_id" :options="$this->projects()"
                                placeholder="{{ __('site.project_id') }}" />

                            <x-form.field label="{{ __('site.decision_num') }}" model="decision_num" type="number"
                                placeholder="{{ __('site.decision_num') }}" />

                            <x-form.field label="{{ __('site.decision_date') }}" model="decision_date" type="number"
                                placeholder="{{ __('site.decision_date') }}" :extra="['min' => 1901, 'max' => date('Y')]" />

                            <x-form.dynamic-select label="{{ __('site.decision_type_id') }}" model="decision_type_id"
                                :options="$this->decisionTypes()" placeholder="{{ __('site.decision_type_id') }}" />

                            <x-form.field label="{{ __('site.total_area_allocated') }}" model="total_area_allocated"
                                placeholder="{{ __('site.total_area_allocated') }}" />

                            <x-form.field label="{{ __('site.total_area_coords') }}" model="total_area_coords"
                                placeholder="{{ __('site.total_area_coords') }}" />

                            <x-form.dynamic-select label="{{ __('site.government_id') }}" model="government_id"
                                :options="$this->governments()" placeholder="{{ __('site.government_id') }}" :extra="['wire:model.live.debounce.200ms' => 'government_id']" />

                            <x-form.dynamic-select label="{{ __('site.city_id') }}" model="city_id" :options="$this->cities()"
                                loading-target="government_id" placeholder="{{ __('site.city_id') }}" />

                            <x-form.field label="{{ __('site.location') }}" model="location"
                                placeholder="{{ __('site.location') }}" />

                            <x-form.field label="{{ __('site.used_area') }}" model="used_area"
                                placeholder="{{ __('site.used_area') }}" />

                            <x-form.field label="{{ __('site.executing_entity_num') }}" model="executing_entity_num"
                                placeholder="{{ __('site.executing_entity_num') }}" />

                            <x-form.field label="{{ __('site.available_area') }}" model="available_area"
                                placeholder="{{ __('site.available_area') }}" />

                            <x-form.field label="{{ __('site.vacant_buildings') }}" model="vacant_buildings"
                                placeholder="{{ __('site.vacant_buildings') }}" />

                            <x-form.field label="{{ __('site.remaining_area') }}" model="remaining_area"
                                placeholder="{{ __('site.remaining_area') }}" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <x-form.enum-group label="{{ __('site.location_status') }}" model="location_status"
                                :enum="\App\Enums\LocationStatus::class" />

                            <x-form.enum-group label="{{ __('site.origin_status') }}" model="origin_status"
                                :enum="\App\Enums\OriginStatus::class" />

                            <x-form.enum-group label="{{ __('site.record_status') }}" model="record_status"
                                :enum="\App\Enums\OriginRecordStatus::class" />
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                            <x-form.field label="{{ __('site.notes') }}" model="notes" type="textarea"
                                placeholder="{{ __('site.notes') }}" />
                        </div>

                        <div class="gap-4">
                            <x-form.field label="{{ __('site.decision_image') }}" model="decision_image" type="file" />

                            @if ($decision_image)
                                @php
                                    $file = Helper::getFilePreviewDetails($decision_image);
                                @endphp

                                @if ($file)
                                    <div class="mt-2 flex items-center">
                                        <img src="{{ $file['iconUrl'] }}" alt="{{ $file['extension'] }} Icon"
                                            class="w-8 h-8 mr-2">
                                        <span class="truncate max-w-xs" title="{{ $file['fileName'] }}">
                                            {{ $file['fileName'] }}
                                        </span>
                                    </div>

                                    @if ($file['isImage'])
                                        <div class="mt-2">
                                            <img src="{{ $file['fileUrl'] }}" alt="Preview of Uploaded" width="100%"
                                                height="600px">
                                        </div>
                                    @endif
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="my-3 flex justify-center items-center">
                        <x-indigo-button wire:click="addDetail" wire:loading.attr="disabled">
                            <x-form.svg-spinner wire:target="addDetail" />
                            + {{ __('site.add_details') }}
                        </x-indigo-button>
                    </div>

                    <div class="mt-2">
                        @foreach ($details as $index => $detail)
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 items-center">
                                <x-form.dynamic-select label="{{ __('site.statement_id') }}"
                                    model="details.{{ $index }}.statement_id" :options="$this->statements()"
                                    placeholder="{{ __('site.statement_id') }}" />

                                <x-form.field label="{{ __('site.used_area') }}"
                                    model="details.{{ $index }}.used_area" type="number"
                                    placeholder="{{ __('site.used_area') }}" :extra="['wire:change' => 'recalculateRemainingArea']" />

                                <x-form.field label="{{ __('site.unit_area') }}"
                                    model="details.{{ $index }}.unit_area" type="number"
                                    placeholder="{{ __('site.unit_area') }}" />

                                <x-form.field label="{{ __('site.number_of_buildings_executed') }}"
                                    model="details.{{ $index }}.number_of_buildings_executed" type="number"
                                    placeholder="{{ __('site.number_of_buildings_executed') }}" />

                                <x-form.field label="{{ __('site.number_of_units') }}"
                                    model="details.{{ $index }}.number_of_units" type="number"
                                    placeholder="{{ __('site.number_of_units') }}" />

                                <x-form.field label="{{ __('site.residential_units') }}"
                                    model="details.{{ $index }}.residential_units" type="number"
                                    placeholder="{{ __('site.residential_units') }}" />

                                <x-form.field label="{{ __('site.administrative_units') }}"
                                    model="details.{{ $index }}.administrative_units" type="number"
                                    placeholder="{{ __('site.administrative_units') }}" />

                                <x-form.field label="{{ __('site.commercial_units') }}"
                                    model="details.{{ $index }}.commercial_units" type="number"
                                    placeholder="{{ __('site.commercial_units') }}" />

                                <x-form.field label="{{ __('site.commercial_shops') }}"
                                    model="details.{{ $index }}.commercial_shops" type="number"
                                    placeholder="{{ __('site.commercial_shops') }}" />

                                {{-- Notes - full width --}}
                                <div class="col-span-2 md:col-span-4">
                                    <x-form.field label="{{ __('site.notes') }}"
                                        model="details.{{ $index }}.note" type="textarea"
                                        placeholder="{{ __('site.notes') }}" class="w-full" />
                                </div>

                                {{-- Delete button - centered --}}
                                <div class="col-span-2 md:col-span-4 flex justify-center">
                                    <x-danger-button class="p-2 flex items-center gap-1"
                                        wire:click="removeDetail({{ $index }})" wire:loading.attr="disabled">
                                        <x-icon class="w-4 h-4" name="trash" />
                                        {{ __('site.remove') }}
                                    </x-danger-button>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="my-3 flex justify-center items-center">
                        <x-indigo-button wire:click="addService" wire:loading.attr="disabled">
                            <x-form.svg-spinner wire:target="addService" />
                            + {{ __('site.sepated_services') }}
                        </x-indigo-button>
                    </div>

                    <div class="mt-2">
                        @foreach ($services as $index => $service)
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 items-center">
                                <x-form.dynamic-select label="{{ __('site.type_service_id') }}"
                                    model="services.{{ $index }}.type_service_id" :options="$this->typeServices()"
                                    placeholder="{{ __('site.type_service_id') }}" />

                                <x-form.field label="{{ __('site.count') }}" model="services.{{ $index }}.count"
                                    type="number" placeholder="{{ __('site.count') }}" />

                                <x-form.field label="{{ __('site.note') }}" model="services.{{ $index }}.note"
                                    placeholder="{{ __('site.note') }}" />

                                <div class="mt-[1.8rem]">
                                    <x-danger-button class="p-2 flex items-center gap-1"
                                        wire:click="removeService({{ $index }})" wire:loading.attr="disabled">
                                        <x-icon class="w-4 h-4" name="trash" />
                                        {{ __('site.remove') }}
                                    </x-danger-button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-slot>

                <x-slot name="footer">
                    <x-indigo-button type="submit" wire:loading.attr="disabled">
                        <x-form.svg-spinner wire:target="save" />
                        {{ __('site.save') }}
                    </x-indigo-button>
                    <x-secondary-button class="mx-2" wire:click="$set('create_modal',false)"
                        wire:loading.attr="disabled">
                        {{ __('site.cancel') }}
                    </x-secondary-button>
                </x-slot>
            @endif
        </x-dialog-modal>
    @endcan
</div>

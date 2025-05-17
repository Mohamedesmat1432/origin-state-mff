<div>
    @can('create-origin')
    <x-dialog-modal wire:model="create_modal" submit="save()" method="POST">
        @if ($this->create_modal)
        <x-slot name="title">
            {{ __('site.create_origin') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <x-form.dynamic-select label="{{ __('site.project_id') }}" model="project_id"
                    :options="$this->projects()" placeholder="{{ __('site.project_id') }}" />

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

                <x-form.dynamic-select label="{{ __('site.statement_id') }}" model="statement_id"
                    :options="$this->statements()" placeholder="{{ __('site.statement_id') }}" />

                <x-form.dynamic-select label="{{ __('site.government_id') }}" model="government_id"
                    :options="$this->governments()" placeholder="{{ __('site.government_id') }}"
                    :extra="['wire:model.live.debounce.200ms' => 'government_id']" />

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

                <x-form.enum-group label="{{ __('site.location_status') }}" model="location_status"
                    :enum="\App\Enums\LocationStatus::class" />

                <x-form.enum-group label="{{ __('site.origin_status') }}" model="origin_status"
                    :enum="\App\Enums\OriginStatus::class" />
            </div>

            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">

                <x-form.field label="{{ __('site.notes') }}" model="notes" type="textarea"
                    placeholder="{{ __('site.notes') }}" />

                <x-form.field label="{{ __('site.decision_image') }}" model="decision_image" type="file" />

                @if ($decision_image)
                @php
                $file = Helper::getFilePreviewDetails($decision_image);
                @endphp

                <div class="mt-4 flex items-center">
                    <img src="{{ $file['iconUrl'] }}" alt="{{ $file['extension'] }} Icon" class="w-8 h-8 mr-2">
                    <span class="truncate max-w-xs" title="{{ $file['fileName'] }}">
                        {{ $file['fileName'] }}
                    </span>
                </div>

                {{-- @if ($file['isPdf'])
                <div class="mt-4">
                    <iframe src="{{ $file['fileUrl'] }}" width="100%" height="600px"
                        class="border rounded shadow"></iframe>
                </div>
                @endif --}}

                @if ($file['isImage'])
                <div class="mt-4">
                    <img src="{{ $file['fileUrl'] }}" alt="Preview of Uploaded" width="100%" height="600px">
                </div>
                @endif
                @endif
                <div>
                    <livewire:location-picker wire:key="location-picker" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-indigo-button type="submit" wire:loading.attr="disabled">
                {{ __('site.save') }}
            </x-indigo-button>
            <x-secondary-button class="mx-2" wire:click="$set('create_modal',false)" wire:loading.attr="disabled">
                {{ __('site.cancel') }}
            </x-secondary-button>
        </x-slot>
        @endif
    </x-dialog-modal>
    @endcan
</div>
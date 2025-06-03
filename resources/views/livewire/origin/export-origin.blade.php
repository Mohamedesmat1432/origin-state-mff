<div>
    @can('export-origin')
    <x-dialog-modal wire:model="export_modal" submit="export()" method="POST" max-width="5xl">
        @if ($this->export_modal)
        <x-slot name="title">
            {{ __('site.export_origin') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <x-form.field label="{{ __('site.search') }}" model="filters.search"
                    placeholder="{{ __('site.search') }}" type="search"
                    :extra="['wire:model.live.debounce.300ms' => 'filters.search']" />

                <x-form.dynamic-select label="{{ __('site.extension') }}" model="extension"
                    :options="['xlsx' => 'xlsx', 'csv' => 'csv', 'xsl' => 'xls']"
                    placeholder="{{ __('site.extension') }}" />

                <x-form.dynamic-select label="{{ __('site.government_id') }}" model="filters.government_id"
                    :options="$this->governments()" placeholder="{{ __('site.government_id') }}"
                    :extra="['wire:model.live.debounce.200ms' => 'filters.government_id']" />

                <x-form.dynamic-select label="{{ __('site.city_id') }}" model="filters.city_id"
                    :options="$this->cities()" placeholder="{{ __('site.city_id') }}"
                    :extra="['wire:model.live.debounce.200ms' => 'filters.city_id']"
                    loading-target="filters.government_id" />

                <x-form.dynamic-select label="{{ __('site.statement_id') }}" model="filters.statement_ids"
                    :options="$this->statements()" placeholder="{{ __('site.statement_id') }}"
                    :extra="['wire:model.live.debounce.200ms' => 'filters.statement_ids', 'multiple' => true]" />

                <x-form.dynamic-select label="{{ __('site.project_id') }}" model="filters.project_ids"
                    :options="$this->projects()" placeholder="{{ __('site.project_id') }}"
                    :extra="['wire:model.live.debounce.200ms' => 'filters.project_ids', 'multiple' => true]" />

                <x-form.dynamic-select label="{{ __('site.decision_type_id') }}" model="filters.decision_type_ids"
                    :options="$this->decisionTypes()" placeholder="{{ __('site.decision_type_id') }}"
                    :extra="['wire:model.live.debounce.200ms' => 'filters.decision_type_ids', 'multiple' => true]" />

                {{-- Select Columns --}}
                <div class="mt-2">
                    <div class="flex justify-between items-center">
                        <x-label :value="__('site.choose_columns_to_export')" />
                        <label class="inline-flex items-center gap-x-2 underline">
                            <x-input type="checkbox" wire:click="selectAllColumns" wire:model.live="checkbox_status" />
                            <span>{{ __('site.select_all') }}</span>
                        </label>
                    </div>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach ($available_columns as $column)
                        <label class="inline-flex items-center gap-x-2">
                            <x-input type="checkbox" wire:model="selected_columns" value="{{ $column }}" />
                            {{ __('site.' . $column) }}
                        </label>
                        @endforeach
                    </div>
                </div>

                <x-form.enum-group label="{{ __('site.origin_status') }}" model="enums.origin_status"
                    :extra="['wire:model.live.debounce.200ms' => 'enums.origin_status']"
                    :enum="\App\Enums\OriginStatus::class" filter-status="true" :filter-count="$this->originsCount()" />

                <x-form.enum-group label="{{ __('site.location_status') }}" model="enums.location_status"
                    :extra="['wire:model.live.debounce.200ms' => 'enums.location_status']"
                    :enum="\App\Enums\LocationStatus::class" filter-status="true"
                    :filter-count="$this->originsCount()" />

                <x-form.enum-group label="{{ __('site.record_status') }}" model="enums.record_status"
                    :extra="['wire:model.live.debounce.200ms' => 'enums.record_status']"
                    :enum="\App\Enums\OriginRecordStatus::class" filter-status="true"
                    :filter-count="$this->originsCount()" />

                {{-- Export Mode --}}
                <div class="mt-2">
                    <x-label :value="__('site.status')" class="block" />
                    <label class="inline-flex items-center mt-2 gap-x-2">
                        <x-input type="checkbox" wire:model.live.debounce.100ms="export_status" />
                        {{ $this->export_status ? __('site.export_only') : __('site.export_to_import') }}
                    </label>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-indigo-button type="submit" wire:loading.attr="disabled">
                <x-form.svg-spinner />
                {{ __('site.export') }}
            </x-indigo-button>

            <x-secondary-button class="mx-2" wire:click="$set('export_modal', false)" wire:loading.attr="disabled">
                {{ __('site.cancel') }}
            </x-secondary-button>
        </x-slot>
        @endif
    </x-dialog-modal>
    @endcan
</div>
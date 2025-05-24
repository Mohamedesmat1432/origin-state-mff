<div>
    @can('export-user')
    <x-dialog-modal wire:model="export_modal" submit="export()" method="POST">
        @if ($this->export_modal)
        <x-slot name="title">
            {{ __('site.export_user') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <x-form.field label="{{ __('site.search') }}" model="filters.search"
                    placeholder="{{ __('site.search') }}" type="search"
                    :extra="['wire:model.live.debounce.300ms' => 'filters.search']" />

                <x-form.dynamic-select label="{{ __('site.extension') }}" model="extension"
                    :options="['xlsx' => 'xlsx', 'csv' => 'csv', 'xsl' => 'xls']"
                    placeholder="{{ __('site.extension') }}" />

                {{-- Select Columns --}}
                <div class="mt-2">
                    <div class="flex justify-between items-center">
                        <x-label :value="__('site.choose_columns_to_export')" />
                        <label class="inline-flex items-center">
                            <x-input type="checkbox" wire:click="selectAllColumns" class="mx-2" />
                            {{ __('site.select_all') }}
                        </label>
                    </div>
                    <div class="flex flex-wrap gap-2 mt-2">
                        @foreach ($available_columns as $column)
                        <label class="inline-flex items-center">
                            <x-input type="checkbox" wire:model="selected_columns" value="{{ $column }}" class="mx-2" />
                            {{ __('site.' . $column) }}
                        </label>
                        @endforeach
                    </div>
                </div>

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
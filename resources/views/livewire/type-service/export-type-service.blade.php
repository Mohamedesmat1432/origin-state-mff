<div>
    @can('export-type-service')
    <x-dialog-modal wire:model.live="export_modal" submit="export()" method="POST">
        @if ($this->export_modal)
        <x-slot name="title">
            {{ __('site.export_type_service') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-form.field label="{{ __('site.search') }}" model="filters.search"
                    placeholder="{{ __('site.search') }}" type="search"
                    :extra="['wire:model.live.debounce.300ms' => 'filters.search']" />

                <x-form.dynamic-select label="{{ __('site.extension') }}" model="extension"
                    :options="['xlsx' => 'xlsx', 'csv' => 'csv', 'xsl' => 'xls']"
                    placeholder="{{ __('site.extension') }}" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-indigo-button type="submit" wire:loading.attr="disabled">
                {{ __('site.export') }}
            </x-indigo-button>

            <x-secondary-button class="mx-2" wire:click="$set('export_modal',false)" wire:loading.attr="disabled">
                {{ __('site.cancel') }}
            </x-secondary-button>
        </x-slot>
        @endif
    </x-dialog-modal>
    @endcan
</div>
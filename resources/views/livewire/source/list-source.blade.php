<div>
    <x-page-content page-name="{{ __('site.sources') }}">

        @can('create-source')
            <livewire:source.create-source />
        @endcan
        @can('edit-source')
            <livewire:source.update-source />
        @endcan
        @can('delete-source')
            <livewire:source.delete-source />
        @endcan
        @can('bulk-delete-source')
            <livewire:source.bulk-delete-source />
        @endcan
        @can('import-source')
            <livewire:source.import-source />
        @endcan
        @can('export-source')
            <livewire:source.export-source />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.sources') }}
                </h1>
            </div>

            <div class="mt-6 text-gray-500 leading-relaxed">
                <div class="mt-3">
                    <div class="md:flex justify-between">
                        <div class="mb-2">
                            <x-input type="search" wire:model.live.debounce.500ms="search"
                                placeholder="{{ __('site.search') }}..." />
                        </div>
                        <div class="mb-2 grid grid-cols-3 md:grid-cols-3 gap-4">
                            <x-create-button permission="create-source" />
                            <x-import-button permission="import-source" />
                            <x-export-button permission="export-source" />
                        </div>
                    </div>
                    @can('bulk-delete-source')
                        <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-source')
                                <td class="px-4 py-2 border">
                                    <div class="text-center">
                                        <x-checkbox wire:click="checkboxAll" wire:model.live="checkbox_status" />
                                    </div>
                                </td>
                            @endcan
                            <td class="p-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('id')">
                                        {{ __('site.id') }}
                                    </button>
                                    <x-sort-icon sort_field="id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('name')">
                                        {{ __('site.name') }}
                                    </button>
                                    <x-sort-icon sort_field="name" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    {{ __('site.action') }}
                                </div>
                            </td>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @forelse ($sources as $source)
                            <tr wire:key="source-{{ $source->id }}" class="odd:bg-gray-100">
                                @can('bulk-delete-source')
                                    <td class="p-2 border">
                                        <x-checkbox wire:model.live="checkbox_arr" value="{{ $source->id }}" />
                                    </td>
                                @endcan
                                <td class="p-2 border">
                                    {{ $source->id }}
                                </td>
                                <td class="p-2 border">
                                    {{ $source->name }}
                                </td>
                                <td class="p-2 border">
                                    <div class="flex justify-center">
                                        <x-edit-button permission="edit-source" id="{{ $source->id }}" />
                                        <div class="mx-1"></div>
                                        <x-delete-button permission="delete-source" id="{{ $source->id }}"
                                            name="{{ $source->name }}" />
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="p-2 border text-center">
                                    {{ __('site.no_data_found') }}
                                </td>
                            </tr>
                        @endforelse
                    </x-slot>
                </x-table>

                @if ($sources->hasPages())
                    <x-paginate :data-links="$sources->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>

<div>
    <x-page-content page-name="{{ __('site.statements') }}">

        @can('create-statement')
            <livewire:statement.create-statement />
        @endcan
        @can('edit-statement')
            <livewire:statement.update-statement />
        @endcan
        @can('delete-statement')
            <livewire:statement.delete-statement />
        @endcan
        @can('bulk-delete-statement')
            <livewire:statement.bulk-delete-statement />
        @endcan
        @can('import-statement')
            <livewire:statement.import-statement />
        @endcan
        @can('export-statement')
            <livewire:statement.export-statement />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.statements') }}
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
                            <x-create-button permission="create-statement" />
                            <x-import-button permission="import-statement" />
                            <x-export-button permission="export-statement" />
                        </div>
                    </div>
                    @can('bulk-delete-statement')
                        <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-statement')
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
                        @forelse ($statements as $statement)
                            <tr wire:key="statement-{{ $statement->id }}" class="odd:bg-gray-100">
                                @can('bulk-delete-statement')
                                    <td class="p-2 border">
                                        <x-checkbox wire:model.live="checkbox_arr" value="{{ $statement->id }}" />
                                    </td>
                                @endcan
                                <td class="p-2 border">
                                    {{ $statement->id }}
                                </td>
                                <td class="p-2 border">
                                    {{ $statement->name }}
                                </td>
                                <td class="p-2 border">
                                    <div class="flex justify-center">
                                        <x-edit-button permission="edit-statement" id="{{ $statement->id }}" />
                                        <div class="mx-1"></div>
                                        <x-delete-button permission="delete-statement" id="{{ $statement->id }}"
                                            name="{{ $statement->name }}" />
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

                @if ($statements->hasPages())
                    <x-paginate :data-links="$statements->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>

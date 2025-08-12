<div>
    <x-page-content page-name="{{ __('site.type_services') }}">

        @can('create-type-service')
            <livewire:type-service.create-type-service />
        @endcan

        @can('edit-type-service')
            <livewire:type-service.update-type-service />
        @endcan

        @can('delete-type-service')
            <livewire:type-service.delete-type-service />
        @endcan

        @can('bulk-delete-type-service')
            <livewire:type-service.bulk-delete-type-service />
        @endcan

        @can('import-type-service')
            <livewire:type-service.import-type-service />
        @endcan

        @can('export-type-service')
            <livewire:type-service.export-type-service />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="text-gray-500 leading-relaxed">
                <div>
                    <div class="md:flex justify-between">
                        <x-form.field model="filters.search" placeholder="{{ __('site.search') }}" type="search"
                            :extra="['wire:model.live.debounce.300ms' => 'filters.search']" />

                        <div class="grid grid-cols-3 md:grid-cols-3 gap-2 mt-2">
                            <x-create-button permission="create-type-service" />
                            <x-import-button permission="import-type-service" />
                            <x-export-button permission="export-type-service" />
                        </div>
                    </div>

                    @can('bulk-delete-type-service')
                        <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-type-service')
                                <td class="px-4 py-2 border">
                                    <div class="text-center">
                                        <x-checkbox wire:click="checkboxDeleteAll" wire:model.live="checkbox_status" />
                                    </div>
                                </td>
                            @endcan
                            <td class="p-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('id')">
                                        {{ __('site.id') }}
                                    </button>
                                    <x-sort-icon sort_field="id" :sort_by="$sort['by']" :sort_asc="$sort['asc']" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('name')">
                                        {{ __('site.name') }}
                                    </button>
                                    <x-sort-icon sort_field="name" :sort_by="$sort['by']" :sort_asc="$sort['asc']" />
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
                        @forelse ($type_services as $type_service)
                            <tr wire:key="type-service-{{ $type_service->id }}" class="odd:bg-gray-100">
                                @can('bulk-delete-type-service')
                                    <td class="p-2 border">
                                        <x-checkbox wire:model.live="checkbox_arr" value="{{ $type_service->id }}" />
                                    </td>
                                @endcan
                                <td class="p-2 border">
                                    {{ $type_service->id }}
                                </td>
                                <td class="p-2 border">
                                    {{ $type_service->name }}
                                </td>
                                <td class="p-2 border">
                                    <div class="flex justify-center gap-x-2">
                                        <x-edit-button permission="edit-type-service" id="{{ $type_service->id }}" />

                                        <x-delete-button permission="delete-type-service"
                                            id="{{ $type_service->id }}" name="{{ $type_service->name }}" />
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

                @if ($type_services->hasPages())
                    <x-paginate :data-links="$type_services->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>

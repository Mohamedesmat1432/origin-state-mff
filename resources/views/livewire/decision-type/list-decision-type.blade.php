<div>
    <x-page-content page-name="{{ __('site.decision_types') }}">

        @can('create-decision-type')
            <livewire:decision-type.create-decision-type />
        @endcan

        @can('edit-decision-type')
            <livewire:decision-type.update-decision-type />
        @endcan

        @can('delete-decision-type')
            <livewire:decision-type.delete-decision-type />
        @endcan

        @can('bulk-delete-decision-type')
            <livewire:decision-type.bulk-delete-decision-type />
        @endcan

        @can('import-decision-type')
            <livewire:decision-type.import-decision-type />
        @endcan

        @can('export-decision-type')
            <livewire:decision-type.export-decision-type />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="text-gray-500 leading-relaxed">
                <div>
                    <div class="md:flex justify-between">
                        <x-form.field model="filters.search" placeholder="{{ __('site.search') }}" type="search"
                            :extra="['wire:model.live.debounce.300ms' => 'filters.search']" />

                        <div class="grid grid-cols-3 md:grid-cols-3 gap-2 mt-2">
                            <x-create-button permission="create-decision-type" />
                            <x-import-button permission="import-decision-type" />
                            <x-export-button permission="export-decision-type" />
                        </div>
                    </div>

                    @can('bulk-delete-decision-type')
                        <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-decision-type')
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
                        @forelse ($decision_types as $decision_type)
                            <tr wire:key="decision-type-{{ $decision_type->id }}" class="odd:bg-gray-100">
                                @can('bulk-delete-decision-type')
                                    <td class="p-2 border">
                                        <x-checkbox wire:model.live="checkbox_arr" value="{{ $decision_type->id }}" />
                                    </td>
                                @endcan
                                <td class="p-2 border">
                                    {{ $decision_type->id }}
                                </td>
                                <td class="p-2 border">
                                    {{ $decision_type->name }}
                                </td>
                                <td class="p-2 border">
                                    <div class="flex justify-center gap-x-2">
                                        <x-edit-button permission="edit-decision-type" id="{{ $decision_type->id }}" />

                                        <x-delete-button permission="delete-decision-type"
                                            id="{{ $decision_type->id }}" name="{{ $decision_type->name }}" />
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

                @if ($decision_types->hasPages())
                    <x-paginate :data-links="$decision_types->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>

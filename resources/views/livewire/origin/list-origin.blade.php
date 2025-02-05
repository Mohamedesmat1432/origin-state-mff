<div>
    <x-page-content page-name="{{ __('site.origins') }}">

        @can('create-origin')
        <livewire:origin.create-origin />
        @endcan
        @can('edit-origin')
        <livewire:origin.update-origin />
        @endcan
        @can('delete-origin')
        <livewire:origin.delete-origin />
        @endcan
        @can('bulk-delete-origin')
        <livewire:origin.bulk-delete-origin />
        @endcan
        @can('import-origin')
        <livewire:origin.import-origin />
        @endcan
        @can('export-origin')
        <livewire:origin.export-origin />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.origins') }}
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
                            <x-create-button permission="create-origin" />
                            <x-import-button permission="import-origin" />
                            <x-export-button permission="export-origin" />
                        </div>
                    </div>
                    @can('bulk-delete-origin')
                    <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-origin')
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
                                    <button wire:click="sortByField('decision_num')">
                                        {{ __('site.decision_num') }}
                                    </button>
                                    <x-sort-icon sort_field="decision_num" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('decision_date')">
                                        {{ __('site.decision_date') }}
                                    </button>
                                    <x-sort-icon sort_field="decision_date" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('source_id')">
                                        {{ __('site.source_id') }}
                                    </button>
                                    <x-sort-icon sort_field="source_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('project_id')">
                                        {{ __('site.project_id') }}
                                    </button>
                                    <x-sort-icon sort_field="project_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('statement_id')">
                                        {{ __('site.statement_id') }}
                                    </button>
                                    <x-sort-icon sort_field="statement_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('government_id')">
                                        {{ __('site.government_id') }}
                                    </button>
                                    <x-sort-icon sort_field="government_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('city_id')">
                                        {{ __('site.city_id') }}
                                    </button>
                                    <x-sort-icon sort_field="city_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('location')">
                                        {{ __('site.location') }}
                                    </button>
                                    <x-sort-icon sort_field="location" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('area')">
                                        {{ __('site.area') }}
                                    </button>
                                    <x-sort-icon sort_field="area" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('internal_incoming_num')">
                                        {{ __('site.internal_incoming_num') }}
                                    </button>
                                    <x-sort-icon sort_field="internal_incoming_num" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('internal_incoming_date')">
                                        {{ __('site.internal_incoming_date') }}
                                    </button>
                                    <x-sort-icon sort_field="internal_incoming_date" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('notes')">
                                        {{ __('site.notes') }}
                                    </button>
                                    <x-sort-icon sort_field="notes" :sort_by="$sort_by" :sort_asc="$sort_asc" />
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
                        @forelse ($origins as $origin)
                        <tr wire:key="origin-{{ $origin->id }}" class="odd:bg-gray-100">
                            @can('bulk-delete-origin')
                            <td class="p-2 border">
                                <x-checkbox wire:model.live="checkbox_arr" value="{{ $origin->id }}" />
                            </td>
                            @endcan
                            <td class="p-2 border">
                                {{ $origin->id }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->decision_num }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->decision_date }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->source?->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->project?->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->statement?->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->government?->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->city?->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->location }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->area }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->internal_incoming_num }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->internal_incoming_date }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->notes }}
                            </td>
                            <td class="p-2 border">
                                <div class="flex justify-center">
                                    <x-edit-button permission="edit-origin" id="{{ $origin->id }}" />
                                    <div class="mx-1"></div>
                                    <x-delete-button permission="delete-origin" id="{{ $origin->id }}"
                                        name="{{ $origin->name }}" />
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

                @if ($origins->hasPages())
                <x-paginate :data-links="$origins->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>
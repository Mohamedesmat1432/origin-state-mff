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
                                    <button wire:click="sortByField('project_id')">
                                        {{ __('site.project_id') }}
                                    </button>
                                    <x-sort-icon sort_field="project_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
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
                                    <button wire:click="sortByField('decision_type_id')">
                                        {{ __('site.decision_type_id') }}
                                    </button>
                                    <x-sort-icon sort_field="decision_type_id" :sort_by="$sort_by"
                                        :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('total_area_allocated')">
                                        {{ __('site.total_area_allocated') }}
                                    </button>
                                    <x-sort-icon sort_field="total_area_allocated" :sort_by="$sort_by"
                                        :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('total_area_coords')">
                                        {{ __('site.total_area_coords') }}
                                    </button>
                                    <x-sort-icon sort_field="total_area_coords" :sort_by="$sort_by"
                                        :sort_asc="$sort_asc" />
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
                                    <button wire:click="sortByField('used_area')">
                                        {{ __('site.used_area') }}
                                    </button>
                                    <x-sort-icon sort_field="used_area" :sort_by="$sort_by"
                                        :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('executing_entity_num')">
                                        {{ __('site.executing_entity_num') }}
                                    </button>
                                    <x-sort-icon sort_field="executing_entity_num" :sort_by="$sort_by"
                                        :sort_asc="$sort_asc" />
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
                                    <button wire:click="sortByField('location_status')">
                                        {{ __('site.location_status') }}
                                    </button>
                                    <x-sort-icon sort_field="location_status" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('available_area')">
                                        {{ __('site.available_area') }}
                                    </button>
                                    <x-sort-icon sort_field="available_area" :sort_by="$sort_by"
                                        :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('vacant_buildings')">
                                        {{ __('site.vacant_buildings') }}
                                    </button>
                                    <x-sort-icon sort_field="vacant_buildings" :sort_by="$sort_by"
                                        :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('remaining_area')">
                                        {{ __('site.remaining_area') }}
                                    </button>
                                    <x-sort-icon sort_field="remaining_area" :sort_by="$sort_by"
                                        :sort_asc="$sort_asc" />
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
                                    <button wire:click="sortByField('origin_status')">
                                        {{ __('site.origin_status') }}
                                    </button>
                                    <x-sort-icon sort_field="origin_status" :sort_by="$sort_by" :sort_asc="$sort_asc" />
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
                                {{ $origin->project?->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->decision_num }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->decision_date }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->decisionType?->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->total_area_allocated }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->total_area_coords }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->statement?->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->used_area }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->executing_entity_num }}
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
                                {{ $origin->location_status->label() }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->available_area }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->vacant_buildings }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->remaining_area }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->notes }}
                            </td>
                            <td class="p-2 border">
                                {{ $origin->origin_status->label() }}
                            </td>
                            <td class="p-2 border">
                                <div class="flex justify-center">
                                    <x-edit-button permission="edit-origin" id="{{ $origin->id }}" />
                                    <div class="mx-1"></div>
                                    <x-delete-button permission="delete-origin" id="{{ $origin->id }}"
                                        name="{{ $origin->decision_num }}" />
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="22" class="p-2 border text-center">
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
<div>
    <x-page-content page-name="{{ __('site.companies') }}">

        @can('create-company')
        <livewire:company.create-company />
        @endcan
        @can('edit-company')
        <livewire:company.update-company />
        @endcan
        @can('delete-company')
        <livewire:company.delete-company />
        @endcan
        @can('bulk-delete-company')
        <livewire:company.bulk-delete-company />
        @endcan
        @can('import-company')
        <livewire:company.import-company />
        @endcan
        @can('export-company')
        <livewire:company.export-company />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.companies') }}
                </h1>
            </div>

            <div class="mt-6 text-gray-500 leading-relaxed">
                <div class="mt-3">
                    <div class="md:flex justify-between">
                        <x-form.field model="filters.search" placeholder="{{ __('site.search') }}" type="search"
                            :extra="['wire:model.live.debounce.300ms' => 'filters.search']" />

                        <div class="flex justify-between gap-2 mt-2">
                            <x-create-button permission="create-company" />
                            <x-import-button permission="import-company" />
                            <x-export-button permission="export-company" />
                        </div>
                    </div>
                    @can('bulk-delete-company')
                    <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-company')
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
                                    <x-sort-icon sort_field="id" :sort_by="$filters['sort_by']" :sort_asc="$filters['sort_asc']" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('name')">
                                        {{ __('site.name') }}
                                    </button>
                                    <x-sort-icon sort_field="name" :sort_by="$filters['sort_by']" :sort_asc="$filters['sort_asc']" />
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
                        @forelse ($companys as $company)
                        <tr wire:key="company-{{ $company->id }}" class="odd:bg-gray-100">
                            @can('bulk-delete-company')
                            <td class="p-2 border">
                                <x-checkbox wire:model.live="checkbox_arr" value="{{ $company->id }}" />
                            </td>
                            @endcan
                            <td class="p-2 border">
                                {{ $company->id }}
                            </td>
                            <td class="p-2 border">
                                {{ $company->name }}
                            </td>
                            <td class="p-2 border">
                                <div class="flex justify-center gap-x-2">
                                    <x-edit-button permission="edit-company" id="{{ $company->id }}" />

                                    <x-delete-button permission="delete-company" id="{{ $company->id }}"
                                        name="{{ $company->name }}" />
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

                @if ($companys->hasPages())
                <x-paginate :data-links="$companys->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>
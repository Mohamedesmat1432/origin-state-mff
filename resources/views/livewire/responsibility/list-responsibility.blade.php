<div>
    <x-page-content page-name="{{ __('site.responsibilities') }}">

        @can('create-responsibility')
            <livewire:responsibility.create-responsibility />
        @endcan
        @can('edit-responsibility')
            <livewire:responsibility.update-responsibility />
        @endcan
        @can('delete-responsibility')
            <livewire:responsibility.delete-responsibility />
        @endcan
        @can('bulk-delete-responsibility')
            <livewire:responsibility.bulk-delete-responsibility />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.responsibilities') }}
                </h1>
            </div>

            <div class="mt-6 text-gray-500 leading-relaxed">
                <div class="mt-3">
                    <div class="md:flex justify-between">
                        <div class="mb-2">
                            <x-input type="search" wire:model.live.debounce.500ms="search"
                                placeholder="{{ __('site.search') }}..." />
                        </div>
                        <div class="mb-2">
                            <x-create-button permission="create-responsibility" />
                        </div>
                    </div>
                    @can('bulk-delete-responsibility')
                        <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-responsibility')
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
                        @forelse ($responsibilities as $responsibility)
                            <tr wire:key="responsibility-{{ $responsibility->id }}" class="odd:bg-gray-100">
                                @can('bulk-delete-responsibility')
                                    <td class="p-2 border">
                                        <x-checkbox wire:model.live="checkbox_arr" value="{{ $responsibility->id }}" />
                                    </td>
                                @endcan
                                <td class="p-2 border">
                                    {{ $responsibility->id }}
                                </td>
                                <td class="p-2 border">
                                    {{ $responsibility->name }}
                                </td>
                                <td class="p-2 border">
                                    <div class="flex justify-center">
                                        <x-edit-button permission="edit-responsibility" id="{{ $responsibility->id }}" />
                                        <div class="mx-1"></div>
                                        <x-delete-button permission="delete-responsibility" id="{{ $responsibility->id }}"
                                            name="{{ $responsibility->name }}" />
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

                @if ($responsibilities->hasPages())
                    <x-paginate :data-links="$responsibilities->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>

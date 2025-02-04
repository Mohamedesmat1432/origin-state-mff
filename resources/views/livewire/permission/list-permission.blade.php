<div>
    <x-page-content page-name="{{ __('site.permissions') }}">

        @can('create-permission')
            <livewire:permission.create-permission />
        @endcan
        @can('edit-permission')
            <livewire:permission.update-permission />
        @endcan
        @can('delete-permission')
            <livewire:permission.delete-permission />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.permissions') }}
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
                            <x-create-button permission="create-permission" />
                        </div>
                    </div>
                </div>
                <x-table>
                    <x-slot name="thead">
                        <tr>
                            <td class="px-4 py-2 border">
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
                        @forelse ($permissions as $permission)
                            <tr wire:key="permission-{{ $permission->id }}" class="odd:bg-gray-100">
                                <td class="p-2 border">
                                    {{ $permission->id }}
                                </td>
                                <td class="p-2 border">
                                    {{ $permission->name }}
                                </td>
                                <td class="p-2 border">
                                    <div class="flex justify-center">
                                        <x-edit-button permission="edit-permission" id="{{ $permission->id }}" />
                                        <div class="mx-1"></div>
                                        <x-delete-button permission="delete-permission" id="{{ $permission->id }}"
                                            name="{{ $permission->name }}" />
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

                @if ($permissions->hasPages())
                    <x-paginate :data-links="$permissions->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>

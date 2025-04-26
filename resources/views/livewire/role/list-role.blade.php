<div>
    <x-page-content page-name="{{ __('site.roles') }}">

        @can('create-role')
        <livewire:role.create-role />
        @endcan
        @can('edit-role')
        <livewire:role.update-role />
        @endcan
        @can('delete-role')
        <livewire:role.delete-role />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.roles') }}
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
                            <x-create-button permission="create-role" />
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
                                    <button wire:click="sortByField('guard_name')">
                                        {{ __('site.guard_name') }}
                                    </button>
                                    <x-sort-icon sort_field="guard_name" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('name')">
                                        {{ __('site.permissions') }}
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
                        @forelse ($roles as $role)
                        <tr wire:key="role-{{ $role->id }}" class="odd:bg-gray-100">
                            <td class="p-2 border">
                                {{ $role->id }}
                            </td>
                            <td class="p-2 border">
                                {{ $role->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $role->guard_name }}
                            </td>
                            <td class="p-2 border">
                                @foreach ($role->getPermissionNames() as $permission)
                                <span
                                    class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold mr-1 px-2.5 py-0.5 rounded">
                                    {{ $permission }}
                                </span>
                                @endforeach
                            </td>
                            <td class="p-2 border">
                                <div class="flex justify-center">
                                    <x-edit-button permission="edit-role" id="{{ $role->id }}" />
                                    <div class="mx-1"></div>
                                    <x-delete-button permission="delete-role" id="{{ $role->id }}"
                                        name="{{ $role->name }}" />
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

                @if ($roles->hasPages())
                <x-paginate :data-links="$roles->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>
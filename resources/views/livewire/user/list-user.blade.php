<div>
    <x-page-content page-name="{{ __('site.users') }}">

        @can('create-user')
            <livewire:user.create-user />
        @endcan
        @can('edit-user')
            <livewire:user.update-user />
        @endcan
        @can('restore-user')
            <livewire:user.restore-user />
        @endcan
        @can('delete-user')
            <livewire:user.delete-user />
        @endcan
        @can('bulk-delete-user')
            <livewire:user.bulk-delete-user />
        @endcan
        @can('force-delete-user')
            <livewire:user.force-delete-user />
        @endcan
        @can('force-bulk-delete-user')
            <livewire:user.force-bulk-delete-user />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.users') }}
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
                            <x-trash-group-button />
                        </div>
                        <div class="mb-2 grid grid-cols-3 md:grid-cols-3 gap-2">
                            <x-create-button permission="create-user" />
                        </div>
                    </div>
                </div>
                @if ($this->trash)
                    @can('force-bulk-delete-user')
                        <x-force-bulk-delete-button />
                    @endcan
                @else
                    @can('bulk-delete-user')
                        <x-bulk-delete-button />
                    @endcan
                @endif

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @if ($this->trash)
                                @can('force-bulk-delete-user')
                                    <td class="px-4 py-2 border">
                                        <div class="text-center">
                                            <x-checkbox wire:click="checkboxAll" wire:model.live="checkbox_status" />
                                        </div>
                                    </td>
                                @endcan
                            @else
                                @can('bulk-delete-user')
                                    <td class="px-4 py-2 border">
                                        <div class="text-center">
                                            <x-checkbox wire:click="checkboxAll" wire:model.live="checkbox_status" />
                                        </div>
                                    </td>
                                @endcan
                            @endif
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
                                    <button wire:click="sortByField('email')">
                                        {{ __('site.email') }}
                                    </button>
                                    <x-sort-icon sort_field="email" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('national_number')">
                                        {{ __('site.national_number') }}
                                    </button>
                                    <x-sort-icon sort_field="national_number" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('phone_number')">
                                        {{ __('site.phone_number') }}
                                    </button>
                                    <x-sort-icon sort_field="phone_number" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('department_id')">
                                        {{ __('site.department_id') }}
                                    </button>
                                    <x-sort-icon sort_field="department_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('job_title_id')">
                                        {{ __('site.job_title_id') }}
                                    </button>
                                    <x-sort-icon sort_field="job_title_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('responsibility_id')">
                                        {{ __('site.responsibility_id') }}
                                    </button>
                                    <x-sort-icon sort_field="responsibility_id" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button>
                                        {{ __('site.roles') }}
                                    </button>
                                    <x-sort-icon sort_field="" :sort_by="$sort_by" :sort_asc="$sort_asc" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('status')">
                                        {{ __('site.status') }}
                                    </button>
                                    <x-sort-icon sort_field="status" :sort_by="$sort_by" :sort_asc="$sort_asc" />
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
                        @forelse ($users as $user)
                            <tr wire:key="user-{{ $user->id }}" class="odd:bg-gray-100">
                                @if ($this->trash)
                                    @can('force-bulk-delete-user')
                                        <td class="p-2 border">
                                            <x-checkbox wire:model.live="checkbox_arr" value="{{ $user->id }}" />
                                        </td>
                                    @endcan
                                @else
                                    @can('bulk-delete-user')
                                        <td class="p-2 border">
                                            <x-checkbox wire:model.live="checkbox_arr" value="{{ $user->id }}" />
                                        </td>
                                    @endcan
                                @endif
                                <td class="p-2 border">
                                    {{ $user->id }}
                                </td>
                                <td class="p-2 border">
                                    {{ $user->name }}
                                </td>
                                <td class="p-2 border">
                                    {{ $user->email }}
                                </td>
                                <td class="p-2 border">
                                    {{ $user->national_number }}
                                </td>
                                <td class="p-2 border">
                                    {{ $user->phone_number }}
                                </td>
                                <td class="p-2 border">
                                    <span
                                        class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold mr-1 px-2.5 py-0.5 rounded">
                                        {{ $user->department?->name }}
                                    </span>
                                </td>
                                <td class="p-2 border">
                                    <span
                                        class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold mr-1 px-2.5 py-0.5 rounded">
                                        {{ $user->jobTitle?->name }}
                                    </span>
                                </td>
                                <td class="p-2 border">
                                    @foreach ($user->responsibilities as $res)
                                        <span
                                            class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold mr-1 px-2.5 py-0.5 rounded">
                                            {{ $res?->name }}
                                        </span>
                                    @endforeach
                                </td>
                                <td class="p-2 border">
                                    @foreach ($user->getRoleNames() as $role)
                                        <span
                                            class="inline-block bg-blue-100 text-blue-800 text-xs font-semibold mr-1 px-2.5 py-0.5 rounded">
                                            {{ $role }}
                                        </span>
                                    @endforeach
                                </td>
                                <td class="p-2 border">
                                    @if ($user->status)
                                        <span class="p-2 bg-green-500 rounded-full text-white">
                                            {{ __('site.active') }}
                                        </span>
                                    @else
                                        <span class="p-2 bg-red-500 rounded-full text-white">
                                            {{ __('site.not_active') }}
                                        </span>
                                    @endif
                                </td>
                                @if ($this->trash)
                                    <td class="p-2 border">
                                        <div class="flex justify-center">
                                            <x-restore-button permission="restore-user" id="{{ $user->id }}"
                                                name="{{ $user->name }}" />
                                            <div class="mx-1"></div>
                                            <x-force-delete-button permission="force-delete-user"
                                                id="{{ $user->id }}" name="{{ $user->name }}" />
                                        </div>
                                    </td>
                                @else
                                    <td class="p-2 border">
                                        <div class="flex justify-center">
                                            <x-edit-button permission="edit-user" id="{{ $user->id }}" />
                                            <div class="mx-1"></div>
                                            <x-delete-button permission="delete-user" id="{{ $user->id }}"
                                                name="{{ $user->name }}" />
                                        </div>
                                    </td>
                                @endif
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

                @if ($users->hasPages())
                    <x-paginate :data-links="$users->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>

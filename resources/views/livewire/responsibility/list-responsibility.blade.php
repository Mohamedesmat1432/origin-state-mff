<div>
    <x-page-content page-name="{{ __('site.responsibilities') }}">

        <livewire:responsibility.create-responsibility />
        <livewire:responsibility.update-responsibility />
        <livewire:responsibility.delete-responsibility />
        <livewire:responsibility.bulk-delete-responsibility />

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            {{-- <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.responsibilities') }}
                </h1>
            </div> --}}

            <div class="text-gray-500 leading-relaxed">
                <div>
                    <div class="md:flex justify-between">
                        <x-form.field model="filters.search" placeholder="{{ __('site.search') }}" type="search"
                            :extra="['wire:model.live.debounce.300ms' => 'filters.search']" />

                        <div class="flex justify-between gap-2 mt-2">
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
                                <div class="flex justify-center gap-x-2">
                                    <x-edit-button permission="edit-responsibility" id="{{ $responsibility->id }}" />

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
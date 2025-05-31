<div>
    <x-page-content page-name="{{ __('site.job_titles') }}">

        @can('create-job-title')
            <livewire:job-title.create-job-title />
        @endcan

        @can('edit-job-title')
            <livewire:job-title.update-job-title />
        @endcan

        @can('delete-job-title')
            <livewire:job-title.delete-job-title />
        @endcan

        @can('bulk-delete-job-title')
            <livewire:job-title.bulk-delete-job-title />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="text-gray-500 leading-relaxed">
                <div>
                    <div class="md:flex justify-between">
                        <x-form.field model="filters.search" placeholder="{{ __('site.search') }}" type="search"
                            :extra="['wire:model.live.debounce.300ms' => 'filters.search']" />

                        <div class="flex justify-between gap-2 mt-2">
                            <x-create-button permission="create-job-title" />
                        </div>
                    </div>

                    @can('bulk-delete-job-title')
                        <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-job-title')
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
                        @forelse ($job_titles as $job_title)
                            <tr wire:key="job_title-{{ $job_title->id }}" class="odd:bg-gray-100">
                                @can('bulk-delete-job-title')
                                    <td class="p-2 border">
                                        <x-checkbox wire:model.live="checkbox_arr" value="{{ $job_title->id }}" />
                                    </td>
                                @endcan
                                <td class="p-2 border">
                                    {{ $job_title->id }}
                                </td>
                                <td class="p-2 border">
                                    {{ $job_title->name }}
                                </td>
                                <td class="p-2 border">
                                    <div class="flex justify-center gap-x-2">
                                        <x-edit-button permission="edit-job-title" id="{{ $job_title->id }}" />

                                        <x-delete-button permission="delete-job-title" id="{{ $job_title->id }}"
                                            name="{{ $job_title->name }}" />
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

                @if ($job_titles->hasPages())
                    <x-paginate :data-links="$job_titles->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>

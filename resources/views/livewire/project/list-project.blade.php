<div>
    <x-page-content page-name="{{ __('site.projects') }}">

        @can('create-project')
            <livewire:project.create-project />
        @endcan

        @can('edit-project')
            <livewire:project.update-project />
        @endcan

        @can('delete-project')
            <livewire:project.delete-project />
        @endcan

        @can('bulk-delete-project')
            <livewire:project.bulk-delete-project />
        @endcan

        @can('import-project')
            <livewire:project.import-project />
        @endcan

        @can('export-project')
            <livewire:project.export-project />
        @endcan

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="text-gray-500 leading-relaxed">
                <div>
                    <div class="md:flex justify-between">
                        <x-form.field model="filters.search" placeholder="{{ __('site.search') }}" type="search"
                            :extra="['wire:model.live.debounce.300ms' => 'filters.search']" />

                        <div class="flex justify-between gap-2 mt-2">
                            <x-create-button permission="create-project" />
                            <x-import-button permission="import-project" />
                            <x-export-button permission="export-project" />
                        </div>
                    </div>

                    @can('bulk-delete-project')
                        <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-project')
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
                        @forelse ($projects as $project)
                            <tr wire:key="project-{{ $project->id }}" class="odd:bg-gray-100">
                                @can('bulk-delete-project')
                                    <td class="p-2 border">
                                        <x-checkbox wire:model.live="checkbox_arr" value="{{ $project->id }}" />
                                    </td>
                                @endcan
                                <td class="p-2 border">
                                    {{ $project->id }}
                                </td>
                                <td class="p-2 border">
                                    {{ $project->name }}
                                </td>
                                <td class="p-2 border">
                                    <div class="flex justify-center gap-x-2">
                                        <x-edit-button permission="edit-project" id="{{ $project->id }}" />

                                        <x-delete-button permission="delete-project" id="{{ $project->id }}"
                                            name="{{ $project->name }}" />
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

                @if ($projects->hasPages())
                    <x-paginate :data-links="$projects->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>

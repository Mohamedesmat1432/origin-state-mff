<div>
    <x-page-content page-name="{{ __('site.origins') }}">

        @can('create-origin')
            <livewire:origin.create-origin />
        @endcan
        @can('show-origin')
            <livewire:origin.show-origin />
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

        <div class="p-6 bg-white border-b border-gray-200 rounded-md">

            <div class=" text-gray-500 leading-relaxed text-xs">
                <div class="md:flex justify-between">
                    <div class="mt-2">
                        <x-input type="search" wire:model.live.debounce.500ms="search"
                            placeholder="{{ __('site.search') }}..." />
                    </div>
                    <div class="grid grid-cols-3 md:grid-cols-3 gap-2 mt-2">
                        <x-create-button permission="create-origin" />
                        <x-import-button permission="import-origin" />
                        <x-export-button permission="export-origin" />
                    </div>
                </div>

                <div class="filter md:flex justify-around">

                    <div class="flex flex-wrap gap-1 mt-2">
                        @foreach (\App\Enums\OriginStatus::cases() as $status)
                            <label class="cursor-pointer" wire:key="origin-status-{{ $status->value }}">
                                <input type="radio" class="hidden peer"
                                    wire:model.live.debounce.100ms="filter_origin_status" value="{{ $status->value }}">
                                <div
                                    class="px-3 py-1 rounded {{ $filter_origin_status == $status->value ? 'opacity-100' : 'opacity-50' }} {{ $status->color() }}">
                                    {{ $status->label() }} ({{ $status->count() }})
                                </div>
                            </label>
                        @endforeach
                        <label class="cursor-pointer" wire:key="origin-status-all">
                            <input type="radio" class="hidden peer"
                                wire:model.live.debounce.100ms="filter_origin_status" value="">
                            <div
                                class="px-3 py-1 rounded bg-slate-700 text-white {{ $filter_origin_status == '' ? 'opacity-100' : 'opacity-60' }}">
                                {{ __('site.all') }} ({{ $this->originsCount() }})
                            </div>
                        </label>
                    </div>

                    <div class="flex flex-wrap gap-1 mt-2">
                        @foreach (\App\Enums\LocationStatus::cases() as $status)
                            <label class="cursor-pointer" wire:key="location-status-{{ $status->value }}">
                                <input type="radio" class="hidden peer"
                                    wire:model.live.debounce.100ms="filter_location_status"
                                    value="{{ $status->value }}">
                                <div
                                    class="px-3 py-1 rounded {{ $filter_location_status == $status->value ? 'opacity-100' : 'opacity-50' }} {{ $status->color() }}">
                                    {{ $status->label() }} ({{ $status->count() }})
                                </div>
                            </label>
                        @endforeach
                        <label class="cursor-pointer" wire:key="location-status-all">
                            <input type="radio" class="hidden peer"
                                wire:model.live.debounce.100ms="filter_location_status" value="">
                            <div
                                class="px-3 py-1 rounded bg-slate-700 text-white {{ $filter_location_status == '' ? 'opacity-100' : 'opacity-60' }}">
                                {{ __('site.all') }} ({{ $this->originsCount() }})
                            </div>
                        </label>
                    </div>
                </div>

                <div class="mt-2">
                    @can('bulk-delete-origin')
                        <x-bulk-delete-button />
                    @endcan
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            @can('bulk-delete-origin')
                                <th class="px-4 py-2 border">
                                    <div class="text-center">
                                        <x-checkbox wire:click="checkboxAll" wire:model.live="checkbox_status" />
                                    </div>
                                </th>
                            @endcan

                            @foreach ($columns as $col)
                                <th class="px-4 py-2 border ">
                                    <button wire:click="sortByField('{{ $col['key'] }}')">
                                        {{ $col['label'] }}
                                    </button>
                                    <x-sort-icon sort_field="{{ $col['key'] }}" :sort_by="$sort_by"
                                        :sort_asc="$sort_asc" />
                                </th>
                            @endforeach

                            <th class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    {{ __('site.action') }}
                                </div>
                            </th>
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

                                @foreach ($columns as $col)
                                    <td class="p-2 border">
                                        {!! $origin->getColumnValue($col['key']) !!}
                                    </td>
                                @endforeach

                                <td class="p-2 border">
                                    <div class="flex justify-center">
                                        <x-show-button permission="show-origin" id="{{ $origin->id }}" />
                                        <div class="mx-1"></div>
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

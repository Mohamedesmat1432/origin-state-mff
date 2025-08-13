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

        @can('add-coordinate-origin')
        <livewire:origin.add-coordinate-origin />
        @endcan

        <div class="p-6 md:px-8 bg-white border-b border-gray-200 rounded-md">

            <div class=" text-gray-500 leading-relaxed">
                <div class="md:flex justify-between gap-x-3">
                    <div class="flex justify-between gap-x-2 mt-2">
                        {{-- Filter Toggle Button --}}
                        <x-indigo-button wire:click="toggleFilters">
                            <x-icon name="funnel" class="h-5 w-5" solid />
                            {{ $show_filters ? __('site.hide_filter') : __('site.show_filter') }}
                            ({{ $this->getFilteredQuery()->count() }})
                        </x-indigo-button>

                        @can('bulk-delete-origin')
                        <x-bulk-delete-button />
                        @endcan
                    </div>

                    {{-- actions --}}
                    <div class="grid grid-cols-3 md:grid-cols-3 gap-2 mt-2">
                        <x-create-button permission="create-origin" />
                        <x-import-button permission="import-origin" />
                        <x-export-button permission="export-origin" />
                    </div>
                </div>

                {{-- Filters Form --}}
                <div class="transition-all ease-out duration-500">
                    @if ($show_filters)
                    <div class="p-2 mt-2 border rounded bg-gray-50 ">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">

                            <x-form.field label="{{ __('site.search') }}" model="filters.search"
                                placeholder="{{ __('site.search') }}" type="search"
                                :extra="['wire:model.live.debounce.300ms' => 'filters.search']" />

                            <x-form.dynamic-select label="{{ __('site.government_id') }}" model="filters.government_id"
                                :options="$this->governments()" placeholder="{{ __('site.government_id') }}"
                                :extra="['wire:model.live.debounce.200ms' => 'filters.government_id']" />

                            <x-form.dynamic-select label="{{ __('site.city_id') }}" model="filters.city_id"
                                :options="$this->cities()" placeholder="{{ __('site.city_id') }}"
                                :extra="['wire:model.live.debounce.200ms' => 'filters.city_id']"
                                loading-target="filters.government_id" />

                            <x-form.dynamic-select label="{{ __('site.statement_id') }}" model="filters.statement_ids"
                                :options="$this->statements()" placeholder="{{ __('site.statement_id') }}" :extra="[
                                        'wire:model.live.debounce.200ms' => 'filters.statement_ids',
                                        'multiple' => true,
                                    ]" />

                            <x-form.dynamic-select label="{{ __('site.project_id') }}" model="filters.project_ids"
                                :options="$this->projects()" placeholder="{{ __('site.project_id') }}" :extra="[
                                        'wire:model.live.debounce.200ms' => 'filters.project_ids',
                                        'multiple' => true,
                                    ]" />

                            <x-form.dynamic-select label="{{ __('site.decision_type_id') }}"
                                model="filters.decision_type_ids" :options="$this->decisionTypes()"
                                placeholder="{{ __('site.decision_type_id') }}" :extra="[
                                        'wire:model.live.debounce.200ms' => 'filters.decision_type_ids',
                                        'multiple' => true,
                                    ]" />

                            <x-form.enum-group label="{{ __('site.origin_status') }}" model="enums.origin_status"
                                :extra="['wire:model.live.debounce.200ms' => 'enums.origin_status']"
                                :enum="\App\Enums\OriginStatus::class" filter-status="true"
                                :filter-count="$this->originsCount()" />

                            <x-form.enum-group label="{{ __('site.location_status') }}" model="enums.location_status"
                                :extra="['wire:model.live.debounce.200ms' => 'enums.location_status']"
                                :enum="\App\Enums\LocationStatus::class" filter-status="true"
                                :filter-count="$this->originsCount()" />

                            <x-form.enum-group label="{{ __('site.record_status') }}" model="enums.record_status"
                                :extra="['wire:model.live.debounce.200ms' => 'enums.record_status']"
                                :enum="\App\Enums\OriginRecordStatus::class" filter-status="true"
                                :filter-count="$this->originsCount()" />
                        </div>

                        {{-- Apply / Clear Buttons --}}
                        <div class="flex mt-4 mb-2 text-sm">
                            <button wire:click="clearFilters"
                                class="p-2 bg-red-500 text-white rounded font-semibold whitespace-nowrap"
                                wire:loading.attr="disabled" wire:target="clearFilters">
                                <x-form.svg-spinner target="clearFilters" />
                                {{ __('site.clear') }}
                            </button>
                        </div>

                        {{-- Resualt Filters --}}
                        @foreach ($this->resualtFilters() as $filter)
                        @if ($filter['value'])
                        <div
                            class="flex items-center justify-between mb-4 text-sm text-gray-700 bg-gray-100 p-2 rounded">
                            <div>
                                <span>{{ __('site.filter_by') }}</span>
                                <strong class="text-blue-600">
                                    {{ $filter['label'] }}
                                </strong>
                            </div>
                            <button wire:click="$set('{{ $filter['clear'] }}', {{ $filter['isArray'] ? '[]' : "''" }})"
                                class="text-red-600 hover:underline">
                                {{ __('site.clear_filter') }}
                            </button>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    @endif
                </div>

                <div class="mt-3">
                    @can('bulk-delete-origin')
                    <div class="flex items-center gap-x-2 mt-1">
                        <x-checkbox wire:click="checkboxDeleteAll" wire:model.live="checkbox_status" />
                        <x-label for="checkbox_status"
                            value="{{$checkbox_status ? __('site.hide_all') : __('site.select_all')}}" />
                    </div>
                    @endcan
                </div>

                <div class="space-y-4 mt-2">
                    @forelse ($origins as $origin)
                    <div wire:key="origin-{{ $origin->id }}" class="border rounded-lg p-4 shadow-sm bg-white">
                        @can('bulk-delete-origin')
                        <div class="flex justify-between mb-2">
                            <x-checkbox wire:model.live="checkbox_arr" value="{{ $origin->id }}" />
                            <span class="text-sm text-gray-600">{{ __('site.origin_id') }}: {{ $origin->id }}</span>
                        </div>
                        @endcan

                        {{-- Display origin data in rows with 3 columns --}}
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            @foreach ($columns as $col)
                            <div
                                class="{{ !in_array($col['key'],['status_info','users_info','decision_image', 'notes']) ? 'md:col-span-4 grid grid-cols-subgrid gap-4' : 'md:col-span-2 grid grid-cols-subgrid gap-4'}}">
                                <div class="text-gray-500 text-sm">{{ $col['label'] }}</div>
                                <div class="text-gray-900 font-medium mt-1">{!! $origin->getColumnValue($col['key']) !!}
                                </div>
                            </div>
                            @endforeach
                        </div>

                        {{-- Action buttons --}}
                        <div class="flex items-center justify-center gap-2 mt-4">
                            <x-show-button permission="show-origin" id="{{ $origin->id }}" />

                            @if ($origin->isLocked())
                            <x-edit-request-button permission="edit-request-origin" id="{{ $origin->id }}" />
                            @else
                            @can('add-coordinate-origin')
                            <x-indigo-button wire:click="$dispatch('add-coodinates',{id:'{{ $origin->id }}'})">
                                <x-icon name="map" class="h-5 w-5" solid />
                            </x-indigo-button>
                            @endcan

                            <x-edit-button permission="edit-origin" id="{{ $origin->id }}" />
                            @endif

                            <x-delete-button permission="delete-origin" id="{{ $origin->id }}"
                                name="{{ $origin->decision_num }}" />
                        </div>
                    </div>
                    @empty
                    <div class="text-center text-gray-600">{{ __('site.no_data_found') }}</div>
                    @endforelse
                </div>


                @if ($origins->hasPages())
                <x-paginate :data-links="$origins->links()" :all="$count_all" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>
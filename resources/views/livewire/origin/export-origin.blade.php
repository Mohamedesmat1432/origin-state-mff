<div>
    @if ($this->export_modal)
        <x-dialog-modal wire:model="export_modal" submit="export()" method="POST">
            <x-slot name="title">
                {{ __('site.export_origin') }}
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    {{-- Search --}}
                    <div>
                        <x-label for="search" :value="__('site.search')" />
                        <x-input type="search" id="search" class="w-full mt-1 p-1 border"
                            placeholder="{{ __('site.search') }}" wire:model.defer="search" />
                    </div>

                    {{-- File Format --}}
                    <div>
                        <x-label for="extension" :value="__('site.extension')" />
                        <x-select id="extension" class="w-full" wire:model.defer="extension">
                            @foreach (['xlsx', 'csv', 'xls', 'csv', 'html', 'pdf'] as $ext)
                                <option value="{{ $ext }}">{{ $ext }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    {{-- Government --}}
                    <div>
                        <x-label for="government_id" :value="__('site.government_id')" />
                        <x-select id="government_id" class="w-full" wire:model.live.debounce.100ms="government_id">
                            <option value="">{{ __('site.select') }}</option>
                            @foreach ($this->governments() as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    {{-- City --}}
                    <div>
                        <x-label for="city_id" :value="__('site.city_id')" />
                        <div wire:loading wire:target="government_id"
                            class="w-4 h-4 border-2 border-black border-t-transparent rounded-full animate-spin"></div>
                        <x-select id="city_id" class="w-full" wire:model="city_id">
                            <option value="">{{ __('site.select') }}</option>
                            @foreach ($this->cities() as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    {{-- Statements --}}
                    <div>
                        <x-label for="selected_statement_ids" :value="__('site.statement_id')" />
                        <x-select id="selected_statement_ids" class="w-full" multiple
                            wire:model.defer="selected_statement_ids">
                            @foreach ($this->statements() as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    {{-- Projects --}}
                    <div>
                        <x-label for="selected_project_ids" :value="__('site.project_id')" />
                        <x-select id="selected_project_ids" class="w-full" multiple
                            wire:model.defer="selected_project_ids">
                            @foreach ($this->projects() as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    {{-- Decision Types --}}
                    <div>
                        <x-label for="selected_decision_type_ids" :value="__('site.decision_type_id')" />
                        <x-select id="selected_decision_type_ids" class="w-full" multiple
                            wire:model.defer="selected_decision_type_ids">
                            @foreach ($this->decisionTypes() as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </x-select>
                    </div>

                    {{-- Select Columns --}}
                    <div>
                        <div class="flex justify-between items-center">
                            <x-label :value="__('site.choose_columns_to_export')" />
                            <label class="inline-flex items-center">
                                <x-input type="checkbox" wire:click="selectAllColumns" class="mx-2" />
                                {{ __('site.select_all') }}
                            </label>
                        </div>
                        <div class="flex flex-wrap gap-2 mt-2">
                            @foreach ($available_columns as $column)
                                <label class="inline-flex items-center">
                                    <x-input type="checkbox" wire:model="selected_columns" value="{{ $column }}"
                                        class="mx-2" />
                                    {{ __('site.' . $column) }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    {{-- Origin Status --}}
                    <div>
                        <x-label :value="__('site.origin_status')" />
                        <div class="flex flex-wrap gap-1 mt-2">
                            @foreach (\App\Enums\OriginStatus::cases() as $status)
                                <label class="cursor-pointer" wire:key="origin-status-{{ $status->value }}">
                                    <input type="radio" class="hidden peer"
                                        wire:model.live.debounce.100ms="filter_origin_status"
                                        value="{{ $status->value }}">
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
                    </div>

                    {{-- Location Status --}}
                    <div>
                        <x-label :value="__('site.location_status')" />
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

                    {{-- Export Mode --}}
                    <div>
                        <x-label :value="__('site.status')" />
                        <label class="inline-flex items-center mt-2">
                            <x-input type="checkbox" wire:model.live.debounce.100ms="export_status" class="mx-2" />
                            {{ $this->export_status ? __('site.export_only') : __('site.export_to_import') }}
                        </label>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-indigo-button type="submit" wire:loading.attr="disabled">
                    {{ __('site.export') }}
                </x-indigo-button>

                <x-secondary-button class="mx-2" wire:click="$set('export_modal', false)"
                    wire:loading.attr="disabled">
                    {{ __('site.cancel') }}
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
    @endif
</div>

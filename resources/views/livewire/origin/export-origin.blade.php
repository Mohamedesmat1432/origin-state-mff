<div>
    @if ($this->export_modal)
        <x-dialog-modal wire:model="export_modal" submit="export()" method="POST">
            <x-slot name="title">
                {{ __('site.export_origin') }}
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mt-3">
                        <x-label for="search" value="{{ __('site.search') }}" />
                        <x-input type="search" placeholder="{{ __('site.search') }}"
                            class="mt-1 block w-full border p-1" wire:model.defer="search" />
                    </div>
                    <div class="mt-3">
                        <x-label for="extension" value="{{ __('site.extension') }}" />
                        <x-select class="block w-full" wire:model.defer="extension">
                            <option value="xlsx">xlsx</option>
                            <option value="csv">csv</option>
                            <option value="ods">ods</option>
                            <option value="ots">ots</option>
                            <option value="html">html</option>
                            <option value="pdf">pdf</option>
                        </x-select>
                    </div>
                    <div class="mt-3">
                        <x-label for="government_id" value="{{ __('site.government_id') }}" />
                        <x-select class="block w-full" wire:model.live.debounce.200ms="government_id">
                            <option value="">{{ __('site.select') }}</option>
                            @foreach ($this->governments() as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="mt-3">
                        <x-label for="city_id" value="{{ __('site.city_id') }}" />
                        <div class="w-4 h-4 border-2 border-black border-t-transparent rounded-full animate-spin"
                            wire:loading wire:target="government_id">
                        </div>
                        <x-select class="block w-full" wire:model="city_id">
                            <option value="">{{ __('site.select') }}</option>
                            @foreach ($this->cities() as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="mt-3">
                        <x-label for="selected_statement_ids" value="{{ __('site.statement_id') }}" />
                        <x-select class="block w-full" wire:model.defer="selected_statement_ids" multiple>
                            <option value="">{{ __('site.select') }}</option>
                            @foreach ($this->statements() as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="mt-3">
                        <x-label for="selected_project_ids" value="{{ __('site.project_id') }}" />
                        <x-select class="block w-full" wire:model.defer="selected_project_ids" multiple>
                            <option value="">{{ __('site.select') }}</option>
                            @foreach ($this->projects() as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="mt-3">
                        <x-label for="selected_decision_type_ids" value="{{ __('site.decision_type_id') }}" />
                        <x-select class="block w-full" wire:model.defer="selected_decision_type_ids" multiple>
                            <option value="">{{ __('site.select') }}</option>
                            @foreach ($this->decisionTypes() as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div class="mt-3">
                        <div class="flex justify-between">
                            <x-label class="block" for="choose_columns_to_export"
                                value="{{ __('site.choose_columns_to_export') }}" />
                            <label class="inline-flex items-center mr-4 mb-2 mt-1">
                                <x-input type="checkbox" wire:click="selectAllColumns" class="mx-2" />
                                {{ __('site.select_all') }}
                            </label>
                        </div>
                        @foreach ($available_columns as $column)
                            <label class="inline-flex items-center mr-4 mb-2 mt-1">
                                <x-input type="checkbox" wire:model="selected_columns" value="{{ $column }}"
                                    class="mx-2" />
                                {{ __('site.' . $column) }}
                            </label>
                        @endforeach
                    </div>
                    <div class="mt-3">
                        <x-label for="origin_status" value="{{ __('site.origin_status') }}" />
                        <div class="flex mt-2">
                            @foreach (\App\Enums\OriginStatus::cases() as $status)
                                <label class="relative cursor-pointer hover:bg-gray-50 transition">
                                    <input type="radio" wire:model.live.debounce.200ms="filter_origin_status"
                                        value="{{ $status->value }}" class="hidden peer">

                                    <div
                                        class="text-white 
                                {{ $loop->first ? 'rtl:rounded-r ltr:rounded-l' : 'rounded-none' }}
                                {{ $loop->last ? 'rtl:rounded-l ltr:rounded-r' : 'rounded-none' }}
                                {{ $filter_origin_status == $status->value ? 'opacity-100' : 'opacity-50' }}
                                {{ $status->color() }}">
                                        {{ $status->label() }}
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-3">
                        <x-label for="origin_status" value="{{ __('site.origin_status') }}" />
                        <div class="flex mt-2">
                            @foreach (\App\Enums\LocationStatus::cases() as $status)
                                <label class="relative cursor-pointer hover:bg-gray-50 transition">
                                    <input type="radio" wire:model.live.debounce.200ms="filter_location_status"
                                        value="{{ $status->value }}" class="hidden peer">

                                    <div
                                        class="text-white 
                                {{ $loop->first ? 'rtl:rounded-r ltr:rounded-l' : 'rounded-none' }}
                                {{ $loop->last ? 'rtl:rounded-l ltr:rounded-r' : 'rounded-none' }}
                                {{ $filter_location_status == $status->value ? 'opacity-100' : 'opacity-50' }}
                                {{ $status->color() }}">
                                        {{ $status->label() }}
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="mt-3">
                        <x-label class="block" for="selected_columns" value="{{ __('site.status') }}" />
                        <label class="inline-flex items-center mr-4 mb-2 mt-1">
                            <x-input type="checkbox" wire:model.live.debounce.200ms="export_status" class="mx-2" />
                            {{ $this->export_status ? __('site.export_only') : __('site.export_to_import') }}
                        </label>
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-indigo-button type="submit" wire:loading.attr="disabled">
                    {{ __('site.export') }}
                </x-indigo-button>

                <x-secondary-button class="mx-2" wire:click="$set('export_modal',false)"
                    wire:loading.attr="disabled">
                    {{ __('site.cancel') }}
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
    @endif
</div>

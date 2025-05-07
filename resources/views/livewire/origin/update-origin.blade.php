<div>
    @if ($this->edit_modal)
        <x-dialog-modal wire:model="edit_modal" submit="save()" method="PATCH">
            <x-slot name="title">
                {{ __('site.update_origin') }}
            </x-slot>

            <x-slot name="content">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mt-2">
                        <x-label for="project_id" value="{{ __('site.project_id') }}" />
                        <x-select class="mt-1 block w-full" wire:model="project_id">
                            <option value="">{{ __('site.select') }}</option>
                            @foreach ($this->projects() as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="project_id" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="decision_num" value="{{ __('site.decision_num') }}" />
                        <x-input type="number" class="mt-1 block w-full" wire:model="decision_num"
                            placeholder="{{ __('site.decision_num') }}" />
                        <x-input-error for="decision_num" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="decision_date" value="{{ __('site.decision_date') }}" />
                        <x-input type="number" class="mt-1 block w-full" min="1900" max="{{ date('Y') }}"
                            wire:model="decision_date" placeholder="{{ __('site.decision_date') }}" />
                        <x-input-error for="decision_date" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="decision_type_id" value="{{ __('site.decision_type_id') }}" />
                        <x-select class="mt-1 block w-full" wire:model="decision_type_id">
                            <option value="">{{ __('site.select') }}</option>
                            @foreach ($this->decisionTypes() as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="decision_type_id" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="total_area_allocated" value="{{ __('site.total_area_allocated') }}" />
                        <x-input type="text" class="mt-1 block w-full" wire:model="total_area_allocated"
                            placeholder="{{ __('site.total_area_allocated') }}" />
                        <x-input-error for="total_area_allocated" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="total_area_coords" value="{{ __('site.total_area_coords') }}" />
                        <x-input type="text" class="mt-1 block w-full" wire:model="total_area_coords"
                            placeholder="{{ __('site.total_area_coords') }}" />
                        <x-input-error for="total_area_coords" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="statement_id" value="{{ __('site.statement_id') }}" />
                        <x-select class="mt-1 block w-full" wire:model="statement_id">
                            <option value="">{{ __('site.select') }}</option>
                            @foreach ($this->statements() as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="statement_id" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="government_id" value="{{ __('site.government_id') }}" />
                        <x-select class="mt-1 block w-full" wire:model.live.debounce.200ms="government_id">
                            <option value="">{{ __('site.select') }}</option>
                            @foreach ($this->governments() as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="government_id" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="city_id" value="{{ __('site.city_id') }}" />
                        <div class="w-4 h-4 border-2 border-black border-t-transparent rounded-full animate-spin"
                            wire:loading wire:target="government_id">
                        </div>
                        <x-select class="mt-1 block w-full" wire:model="city_id">
                            <option value=""> {{ __('site.select') }}</option>
                            @foreach ($this->cities() as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </x-select>
                        <x-input-error for="city_id" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="location" value="{{ __('site.location') }}" />
                        <x-input type="text" class="mt-1 block w-full" wire:model="location"
                            placeholder="{{ __('site.location') }}" />
                        <x-input-error for="location" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="location_status" value="{{ __('site.location_status') }}" />
                        <div class="flex flex-wrap gap-1 mt-2">
                            @foreach (\App\Enums\LocationStatus::cases() as $status)
                                <label class="cursor-pointer" wire:key="location-status-{{ $status }}">
                                    <input type="radio" class="hidden peer"
                                        wire:model.live.debounce.100ms="location_status"
                                        value="{{ $status->value }}">
                                    <div
                                        class="px-3 py-1 rounded {{ $location_status == $status ? 'opacity-100' : 'opacity-50' }} {{ $status->color() }}">
                                        {{ $status->label() }} ({{ $status->count() }})
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        <x-input-error for="location_status" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="used_area" value="{{ __('site.used_area') }}" />
                        <x-input type="number" class="mt-1 block w-full" wire:model="used_area"
                            placeholder="{{ __('site.used_area') }}" />
                        <x-input-error for="used_area" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="executing_entity_num" value="{{ __('site.executing_entity_num') }}" />
                        <x-input type="text" class="mt-1 block w-full" wire:model="executing_entity_num"
                            placeholder="{{ __('site.executing_entity_num') }}" />
                        <x-input-error for="executing_entity_num" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="available_area" value="{{ __('site.available_area') }}" />
                        <x-input type="text" class="mt-1 block w-full" wire:model="available_area"
                            placeholder="{{ __('site.available_area') }}" />
                        <x-input-error for="available_area" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="vacant_buildings" value="{{ __('site.vacant_buildings') }}" />
                        <x-input type="text" class="mt-1 block w-full" wire:model="vacant_buildings"
                            placeholder="{{ __('site.vacant_buildings') }}" />
                        <x-input-error for="vacant_buildings" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="remaining_area" value="{{ __('site.remaining_area') }}" />
                        <x-input type="text" class="mt-1 block w-full" wire:model="remaining_area"
                            placeholder="{{ __('site.remaining_area') }}" />
                        <x-input-error for="remaining_area" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="origin_status" value="{{ __('site.origin_status') }}" />
                        <div class="flex flex-wrap gap-1 mt-2">
                            @foreach (\App\Enums\OriginStatus::cases() as $status)
                                <label class="cursor-pointer" wire:key="origin-status-{{ $status }}">
                                    <input type="radio" class="hidden peer"
                                        wire:model.live.debounce.100ms="origin_status" value="{{ $status->value }}">
                                    <div
                                        class="px-3 py-1 rounded {{ $origin_status == $status ? 'opacity-100' : 'opacity-50' }} {{ $status->color() }}">
                                        {{ $status->label() }} ({{ $status->count() }})
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        <x-input-error for="origin_status" class="mt-2" />
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                    <div class="mt-2">
                        <x-label for="notes" value="{{ __('site.notes') }}" />
                        <x-textarea class="mt-1 block w-full" wire:model.lazy="notes"
                            placeholder="{{ __('site.notes') }}">
                        </x-textarea>
                        <x-input-error for="notes" class="mt-2" />
                    </div>

                    <div class="mt-2">
                        <x-label for="decision_image" value="{{ __('site.decision_image') }}" />
                        <x-input type="file" class="mt-1 block w-full" wire:model.lazy="decision_image"
                            accept=".png,.jpg,.jpeg,.gif,.webp,.xlsx,.xls,.doc,.docx,.odt,.csv,.pdf" />
                        <x-input-error for="decision_image" class="mt-2" />
                        @php
                            $file = Helper::getFilePreviewDetails($decision_image ?? $old_decision_image);
                        @endphp

                        @if ($file)
                            <div class="mt-4 flex items-center">
                                <img src="{{ $file['iconUrl'] }}" alt="{{ $file['extension'] }} Icon"
                                    class="w-8 h-8 mr-2" />
                                <span class="truncate max-w-xs" title="{{ $file['fileName'] }}">
                                    {{ $file['fileName'] }}
                                </span>
                            </div>

                            @if ($file['isPdf'])
                                <div class="mt-4">
                                    <iframe src="{{ $file['fileUrl'] }}" width="100%" height="600px"
                                        class="border rounded shadow"></iframe>
                                </div>
                            @endif

                            @if ($file['isImage'])
                                <div class="mt-4">
                                    <img src="{{ $file['fileUrl'] }}" alt="Preview of Uploaded" width="100%"
                                        height="600px" />
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-indigo-button type="submit" wire:loading.attr="disabled">
                    {{ __('site.save') }}
                </x-indigo-button>
                <x-secondary-button class="mx-2" wire:click="$set('edit_modal',false)"
                    wire:loading.attr="disabled">
                    {{ __('site.cancel') }}
                </x-secondary-button>
            </x-slot>
        </x-dialog-modal>
    @endif
</div>

<div>
    @if ($this->create_modal)
    <x-dialog-modal wire:model="create_modal" submit="save()" method="POST">

        <x-slot name="title">
            {{ __('site.create_origin') }}
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
                    <x-input type="number" class="mt-1 block w-full" min="1900" max="{{date('Y')}}"
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
                    <div class="flex mt-2">
                        @foreach(\App\Enums\LocationStatus::cases() as $status)
                        <label class="relative cursor-pointer hover:bg-gray-50 transition">
                            <input type="radio" wire:model.live.debounce.200ms="location_status"
                                value="{{ $status->value }}" class="hidden peer">

                            <div class="text-white 
                                    {{ $loop->first ? 'rtl:rounded-r ltr:rounded-l' : 'rounded-none' }}
                                    {{ $loop->last ? 'rtl:rounded-l ltr:rounded-r' : 'rounded-none' }}
                                    {{ $location_status == $status->value ? 'opacity-100' : 'opacity-50' }}
                                    {{ $status->color() }}">
                                {{ $status->label() }}
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
                    <div class="flex mt-2">
                        @foreach(\App\Enums\OriginStatus::cases() as $status)
                        <label class="relative cursor-pointer hover:bg-gray-50 transition">
                            <input type="radio" wire:model.live.debounce.200ms="origin_status"
                                value="{{ $status->value }}" class="hidden peer">

                            <div class="text-white 
                                {{ $loop->first ? 'rtl:rounded-r ltr:rounded-l' : 'rounded-none' }}
                                {{ $loop->last ? 'rtl:rounded-l ltr:rounded-r' : 'rounded-none' }}
                                {{ $origin_status == $status->value ? 'opacity-100' : 'opacity-50' }}
                                {{ $status->color() }}">
                                {{ $status->label() }}
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
                    <x-textarea class="mt-1 block w-full" wire:model.lazy="notes" placeholder="{{ __('site.notes') }}">
                    </x-textarea>
                    <x-input-error for="notes" class="mt-2" />
                </div>

                <div class="mt-2">
                    <x-label for="decision_image" value="{{ __('site.decision_image') }}" />
                    <x-input type="file" class="mt-1 block w-full" wire:model.lazy="decision_image" />
                    <x-input-error for="decision_image" class="mt-2" />
                    @if ($decision_image)
                        @php
                            $extension = pathinfo($decision_image->getClientOriginalName(), PATHINFO_EXTENSION);
                            $availableExts = ['png', 'jpg', 'gif', 'jpeg', 'webp'];
                            $fileName = $decision_image->getClientOriginalName();
                            $fileUrl = $decision_image->temporaryUrl(now()->addMinutes(10));
                            $icons = [
                            'xlsx' => asset('icons/icon-excel.png'),
                            'xls' => asset('icons/icon-excel.png'),
                            'pdf' => asset('icons/icon-pdf.png'),
                            'doc' => asset('icons/icon-word.png'),
                            'docx' => asset('icons/icon-word.png'),
                            ];
                            $icon = $icons[$extension] ?? asset('icons/icon-file.png');
                        @endphp

                        <div class="mt-4 flex items-center">
                            <img src="{{ $icon }}" alt="{{ $extension }} Icon" class="w-8 h-8 mr-2">
                            <span>{{ $fileName }}</span>
                        </div>

                        @if (in_array(strtolower($extension), $availableExts) || method_exists($fileUrl, 'temporaryUrl'))
                            <div class="mt-4">
                                <h4 class="font-semibold">Preview of Uploaded:</h4>
                                <img src="{{ $fileUrl }}" alt="Preview of Uploaded" width="100%" height="600px">
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
            <x-secondary-button class="mx-2" wire:click="$set('create_modal',false)" wire:loading.attr="disabled">
                {{ __('site.cancel') }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    @endif
</div>
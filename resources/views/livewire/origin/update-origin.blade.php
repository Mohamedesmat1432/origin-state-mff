<div>
    @if ($this->edit_modal)
    <x-dialog-modal wire:model="edit_modal" submit="save()" method="PATCH">
        <x-slot name="title">
            {{ __('site.update_origin') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mt-2">
                    <x-label for="decision_num" value="{{ __('site.decision_num') }}" />
                    <x-input type="number" class="mt-1 block w-full" wire:model="decision_num"
                        placeholder="{{ __('site.decision_num') }}" />
                    <x-input-error for="decision_num" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="decision_date" value="{{ __('site.decision_date') }}" />
                    <x-input type="number" class="mt-1 block w-full" wire:model="decision_date"
                        min="1990" max="{{date('Y')}}" placeholder="{{ __('site.decision_date') }}" />
                    <x-input-error for="decision_date" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="source_id" value="{{ __('site.source_id') }}" />
                    <x-select class="mt-1 block w-full" wire:model="source_id">
                        <option value="">{{ __('site.select') }}</option>
                        @foreach ($this->sources() as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="source_id" class="mt-2" />
                </div>
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
                    <x-select class="mt-1 block w-full" wire:model="government_id" wire:change="cities">
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
                        wire:loading wire:target="cities">
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
                    <x-label for="area" value="{{ __('site.area') }}" />
                    <x-input type="number" class="mt-1 block w-full" wire:model="area"
                        placeholder="{{ __('site.area') }}" />
                    <x-input-error for="area" class="mt-2" />
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <div class="mt-2">
                    <x-label for="location" value="{{ __('site.location') }}" />
                    <x-input type="text" class="mt-1 block w-full" wire:model="location"
                        placeholder="{{ __('site.location') }}" />
                    <x-input-error for="location" class="mt-2" />
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mt-2">
                    <x-label for="internal_incoming_num" value="{{ __('site.internal_incoming_num') }}" />
                    <x-input type="number" class="mt-1 block w-full" wire:model="internal_incoming_num"
                        placeholder="{{ __('site.internal_incoming_num') }}" />
                    <x-input-error for="internal_incoming_num" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="internal_incoming_date" value="{{ __('site.internal_incoming_date') }}" />
                    <x-input type="date" class="mt-1 block w-full" wire:model="internal_incoming_date"
                        placeholder="{{ __('site.internal_incoming_date') }}" />
                    <x-input-error for="internal_incoming_date" class="mt-2" />
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <div class="mt-2">
                    <x-label for="notes" value="{{ __('site.notes') }}" />
                    <x-textarea class="mt-1 block w-full" wire:model="notes"
                        placeholder="{{ __('site.notes') }}">
                    </x-textarea>
                    <x-input-error for="notes" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="decision_image" value="{{ __('site.decision_image') }}" />
                    <x-input type="file" class="mt-1 block w-full" wire:model="decision_image" />
                    <x-input-error for="decision_image" class="mt-2" />
                    @php
                    $extension = pathinfo($decision_image, PATHINFO_EXTENSION);
                    $icons = [
                    'xlsx' => asset('icons/icon-excel.png'),
                    'xls' => asset('icons/icon-excel.png'),
                    'pdf' => asset('icons/icon-pdf.png'),
                    'doc' => asset('icons/icon-word.png'),
                    'docx' => asset('icons/icon-word.png'),
                    ];
                    $icon = $icons[$extension] ?? asset('icons/icon-file.png');
                    @endphp
                    @if ($decision_image)
                    <div class="mt-4 flex items-center">
                        <img src="{{ $icon }}" alt="{{ $extension }} Icon" class="w-8 h-8 mr-2">
                        <span>{{ $decision_image->temporaryUrl() }}</span>
                    </div>
                    <!-- <div class="mt-4">
                        <h4>Preview of Uploaded PDF:</h4>
                        <iframe src="{{ $decision_image->temporaryUrl() }}" width="100%" height="600px"></iframe>
                    </div> -->
                    @elseif($old_decision_image)
                    <div class="mt-4 flex items-center">
                        <img src="{{ $icon }}" alt="{{ $extension }} Icon" class="w-8 h-8 mr-2">
                        <span>{{ $old_decision_image }}</span>
                    </div>
                    <div class="mt-4">
                        <h4>Preview of Uploaded PDF:</h4>
                        <iframe src="{{ asset('storage/' . $old_decision_image) }}" width="100%" height="600px"></iframe>
                    </div>
                    @endif
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-indigo-button type="submit" wire:loading.attr="disabled">
                {{ __('site.save') }}
            </x-indigo-button>
            <x-secondary-button class="mx-2" wire:click="$set('edit_modal',false)" wire:loading.attr="disabled">
                {{ __('site.cancel') }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    @endif
</div>
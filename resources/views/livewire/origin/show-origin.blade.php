<div>
    @if ($this->show_modal)
    <x-dialog-modal wire:model="show_modal">
        
        <x-slot name="title">
            {{ __('site.show_origin') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="project_id" value="{{ __('site.project_id') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->project?->name }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="decision_num" value="{{ __('site.decision_num') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->decision_num }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="decision_date"
                        value="{{ __('site.decision_date') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->decision_date }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="decision_type_id"
                        value="{{ __('site.decision_type_id') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->decisionType?->name }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="total_area_allocated"
                        value="{{ __('site.total_area_allocated') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->total_area_allocated }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="total_area_coords"
                        value="{{ __('site.total_area_coords') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->total_area_coords }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="statement_id" value="{{ __('site.statement_id') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->statement?->name }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="government_id"
                        value="{{ __('site.government_id') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->government?->name }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="city_id" value="{{ __('site.city_id') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->city?->name }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="location" value="{{ __('site.location') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->location }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="location_status"
                        value="{{ __('site.location_status') }}" />
                    <div class="mt-1 block w-full">
                        <span class="rounded {{ $this->origin->location_status->color() }}">
                            {{ $this->origin->location_status->label() }}
                        </span>
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="used_area" value="{{ __('site.used_area') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->used_area }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="executing_entity_num"
                        value="{{ __('site.executing_entity_num') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->executing_entity_num }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="available_area"
                        value="{{ __('site.available_area') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->available_area }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="vacant_buildings"
                        value="{{ __('site.vacant_buildings') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->vacant_buildings }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="remaining_area"
                        value="{{ __('site.remaining_area') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->remaining_area }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="origin_status"
                        value="{{ __('site.origin_status') }}" />
                    <div class="mt-1 block w-full">
                        <span class="rounded {{ $this->origin->origin_status->color() }}">
                            {{ $this->origin->origin_status->label() }}
                        </span>
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="notes" value="{{ __('site.notes') }}" />
                    <div class="mt-1 block w-full">
                        {{ $this->origin->notes }}
                    </div>
                </div>

                <div class="mt-2">
                    <x-label class="font-extrabold text-3xl" for="decision_image"
                        value="{{ __('site.decision_image') }}" />
                    @if ($this->origin->decision_image)
                        @php
                            $extension = pathinfo($this->origin->decision_image, PATHINFO_EXTENSION);
                            $fileUrl = asset('storage/' . $this->origin->decision_image);
                            $fileName = basename($fileUrl);
                            $availableExts = ['png', 'jpg', 'gif', 'jpeg', 'webp'];
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

                        @if (in_array(strtolower($extension), $availableExts))
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
            <x-secondary-button class="mx-2" wire:click="$set('show_modal',false)" wire:loading.attr="disabled">
                {{ __('site.cancel') }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    @endif
</div>
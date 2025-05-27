<div>
    @can('add-coordinate-origin')
        <x-dialog-modal wire:model="add_coodinates" submit="save()" method="PATCH">
            @if ($this->add_coodinates)
                <x-slot name="title">
                    {{ __('site.add_coordinates_origin') }}
                </x-slot>

                <x-slot name="content">
                    <div class="grid gap-4">
                        <div x-data="mapComponent(@entangle('map_government'), @entangle('map_city'), @entangle('coordinates'), @entangle('total_area_coords'))" x-init="init();
                        Livewire.hook('message.processed', () => run());
                        window.addEventListener('coordinates-updated', () => {
                            coordsInput = $wire.coordinates;
                            run();
                        });">

                            <!-- حقول الإدخال -->
                            <div class="flex gap-2 mt-2">
                                <input x-model="governorate" class="border p-2 rounded w-full"
                                    placeholder="{{ __('site.government') }}" disabled />
                                <input x-model="city" class="border p-2 rounded w-full" placeholder="{{ __('site.city') }}"
                                    disabled />
                            </div>

                            <div class="flex gap-2 mt-2">
                                <div>
                                    <input type="file" wire:model="excel_file"
                                        class="border p-2 rounded w-full text-gray-500" />

                                    <x-input-error for="excel_file" class="mt-1" />
                                </div>

                                <x-indigo-button wire:click="uploadCoordinates">
                                    {{ __('site.upload_coordinates') }}
                                </x-indigo-button>
                            </div>

                            <div>
                                <textarea x-model="coordsInput" class="border p-2 rounded w-full mt-2" rows="5"
                                    placeholder="3013561.441,3013215.575&#10;..."></textarea>

                                <x-input-error for="coordinates" class="mt-2" />
                            </div>

                            <div class="relative w-full" wire:ignore>
                                <div id="map" x-ref="map" class="h-96 rounded my-2"></div>
                            </div>

                            {{ __('site.area') }}: <span x-text="formattedArea"></span> م²

                            <template x-if="errorMessage">
                                <div class="text-red-600" x-text="errorMessage"></div>
                            </template>

                            <div class="flex gap-x-2">
                                <div class="mt-2">
                                    <x-indigo-button type="button" @click="run">
                                        {{ __('site.execute') }}
                                    </x-indigo-button>
                                </div>

                                {{-- <div class="mt-2">
                                <x-indigo-button x-show="errorMessage !== ''" class="cursor-not-allowed opacity-60">
                                    {{ __('site.save') }}
                                </x-indigo-button>

                                <x-indigo-button x-show="errorMessage === ''" wire:click="save">
                                    {{ __('site.save') }}
                                </x-indigo-button>
                            </div> --}}
                            </div>
                        </div>
                    </div>

                </x-slot>

                <x-slot name="footer">
                    <x-indigo-button type="submit" wire:loading.attr="disabled">
                        {{ __('site.save') }}
                    </x-indigo-button>

                    <x-secondary-button class="mx-2" wire:click="$set('add_coodinates',false)"
                        wire:loading.attr="disabled">
                        {{ __('site.cancel') }}
                    </x-secondary-button>
                </x-slot>
            @endif
        </x-dialog-modal>
    @endcan
</div>

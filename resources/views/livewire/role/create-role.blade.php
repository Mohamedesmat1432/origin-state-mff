<div>
    @if ($this->create_modal)
        <x-dialog-modal wire:model="create_modal" submit="save()" method="POST">
            <x-slot name="title">
                {{ __('site.create_new_role') }}
            </x-slot>

            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4">
                    <x-label for="name" value="{{ __('site.name') }}" />
                    <x-input type="text" class="mt-1 block w-full" wire:model="name"
                        placeholder="{{ __('site.name') }}" autocomplete="on" />
                    <x-input-error for="name" class="mt-2" />
                </div>
                <div class="col-span-6 sm:col-span-4 mt-3">
                    <x-label for="permission_ids" value="{{ __('site.permissions') }}" />
                    <div class="mt-1 w-full grid grid-cols-1 md:grid-cols-4 gap-4 py-2 border p-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                        @foreach ($this->permissions() as $permission)
                        <div>
                            <x-checkbox wire:model="permission_ids" value="{{ $permission }}" />
                            <x-label for="permission_ids" value="{{ $permission }}" class="ltr:mr-2 rtl:ml-2" />
                        </div>
                        @endforeach
                    </div>
                    {{-- <x-select class="mt-1 block w-full h-48" wire:model="permission_ids" multiple>
                        @foreach ($this->permissions() as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </x-select> --}}
                    <x-input-error for="permission_ids" class="mt-2" />
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

<div>
    @if ($this->edit_modal)
    <x-dialog-modal wire:model="edit_modal" submit="save()" method="PATCH">
        <x-slot name="title">
            {{ __('site.update_user') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mt-2">
                    <x-label for="name" value="{{ __('site.name') }}" />
                    <x-input type="text" class="mt-1 block w-full" wire:model="name" placeholder="{{ __('site.name') }}"
                        autocomplete="username" />
                    <x-input-error for="name" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="email" value="{{ __('site.email') }}" />
                    <x-input type="email" class="mt-1 block w-full" wire:model="email"
                        placeholder="{{ __('site.email') }}" autocomplete="email" />
                    <x-input-error for="email" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="national_number" value="{{ __('site.national_number') }}" />
                    <x-input type="text" class="mt-1 block w-full" wire:model="national_number"
                        placeholder="{{ __('site.national_number') }}" autocomplete="national_number" />
                    <x-input-error for="national_number" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="phone_number" value="{{ __('site.phone_number') }}" />
                    <x-input type="text" class="mt-1 block w-full" wire:model="phone_number"
                        placeholder="{{ __('site.phone_number') }}" autocomplete="phone_number" />
                    <x-input-error for="phone_number" class="mt-2" />
                </div>
                <div class="mt-2" x-data="{ showPassword: false }">
                    <x-label for="new_password" value="{{ __('site.new_password') }}" />
                    <div class="relative">
                        <x-input id="password" class="block mt-1 w-full" ::type="showPassword ? 'text' : 'password'"
                            wire:model="new_password" placeholder="{{ __('site.new_password') }}" />
                        <button class="absolute inset-y-0 rtl:left-0 ltr:right-0 px-3 flex items-center cursor-pointer"
                            x-on:click="showPassword = ! showPassword" type="button">
                            <x-icon name="eye" x-show="showPassword" />
                            <x-icon name="eye-slash" x-show="!showPassword" />
                        </button>
                    </div>
                    <x-input-error for="new_password" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="department_id" value="{{ __('site.department_id') }}" />
                    <x-select class="mt-1 block w-full" wire:model="department_id">
                        <option value="">{{ __('site.select') }}</option>
                        @foreach ($this->departments() as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="department_id" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="job_title_id" value="{{ __('site.job_title_id') }}" />
                    <x-select class="mt-1 block w-full" wire:model="job_title_id">
                        <option value="">{{ __('site.select') }}</option>
                        @foreach ($this->jobTitles() as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </x-select>
                    <x-input-error for="job_title_id" class="mt-2" />
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mt-2">
                <div class="mt-2">
                    <x-label for="responsibility" value="{{ __('site.responsibilities') }}" />
                    <div class="mt-1 w-full grid grid-cols-1 md:grid-cols-4 gap-4 py-2 border p-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                        @foreach ($this->responsibilities() as $key => $val)
                        <div>
                            <x-checkbox wire:model="responsibilityIds" value="{{ $key }}" />
                            <x-label for="responsibility" value="{{ $val }}" class="ltr:mr-2 rtl:ml-2" />
                        </div>
                        @endforeach
                    </div>
                    {{-- <x-select class="mt-1 block w-full" wire:model="responsibilityIds" multiple>
                        @foreach ($this->responsibilities() as $key => $val)
                        <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </x-select> --}}
                    <x-input-error for="responsibilityIds" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-label for="role" value="{{ __('site.roles') }}" />
                    <x-checkbox wire:click="checkALlRole" wire:model="check_all_roles" />
                    <div class="mt-1 w-full grid grid-cols-1 md:grid-cols-4 gap-4 py-2 border p-2 border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-md shadow-sm">
                        @foreach ($this->roles() as $role)
                        <div>
                            <x-checkbox wire:model="role" value="{{ $role }}" />
                            <x-label for="role" value="{{ $role }}" class="ltr:mr-2 rtl:ml-2" />
                        </div>
                        @endforeach
                    </div>
                    {{-- <x-select class="mt-1 block w-full" wire:model="role" multiple>
                        @foreach ($this->roles() as $role)
                        <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </x-select> --}}
                    <x-input-error for="role" class="mt-2" />
                </div>
                <div class="mt-2">
                    <x-toggle-status :status="$status" />
                    <x-input-error for="status" class="mt-2" />
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
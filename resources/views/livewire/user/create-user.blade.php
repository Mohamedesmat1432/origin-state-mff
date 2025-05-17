<div>
    @can('create-user')
    <x-dialog-modal wire:model="create_modal" submit="save()" method="POST">
        @if ($this->create_modal)
        <x-slot name="title">
            {{ __('site.create_new_user') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <x-form.field label="{{ __('site.name') }}" model="name" placeholder="{{ __('site.name') }}" />

                <x-form.field label="{{ __('site.email') }}" model="email" placeholder="{{ __('site.email') }}"
                    type="email" />

                <x-form.field label="{{ __('site.national_number') }}" model="national_number"
                    placeholder="{{ __('site.national_number') }}" />

                <x-form.field label="{{ __('site.phone_number') }}" model="phone_number"
                    placeholder="{{ __('site.phone_number') }}" />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mt-2" x-data="{ showPassword: false }">
                    <x-label for="password" value="{{ __('site.password') }}" />
                    <div class="relative">
                        <x-input id="password" class="block mt-1 w-full" ::type="showPassword ? 'text' : 'password'"
                            wire:model="password" required placeholder="{{ __('site.password') }}"
                            autocomplete="current-password" />
                        <button class="absolute inset-y-0 rtl:left-0 ltr:right-0 px-3 flex items-center cursor-pointer"
                            x-on:click="showPassword = ! showPassword" type="button">
                            <x-icon name="eye" x-show="showPassword" />
                            <x-icon name="eye-slash" x-show="!showPassword" />
                        </button>
                    </div>
                    <x-input-error for="password" class="mt-2" />
                </div>

                <x-form.dynamic-select label="{{ __('site.department_id') }}" model="department_id" is-select="true"
                    :options="$this->departments()" placeholder="{{ __('site.department_id') }}" />

                <x-form.dynamic-select label="{{ __('site.job_title_id') }}" model="job_title_id" is-select="true"
                    :options="$this->jobTitles()" placeholder="{{ __('site.job_title_id') }}" />
            </div>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4 mt-2">

                <x-form.dynamic-checkbox label="{{ __('site.responsibilities') }}" model="responsibility_ids"
                    :options="$this->responsibilities()" placeholder="{{ __('site.responsibilities') }}" />

                <x-form.dynamic-checkbox label="{{ __('site.roles') }}" model="role_ids" :options="$this->roles()"
                    placeholder="{{ __('site.roles') }}" />

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
            <x-secondary-button class="mx-2" wire:click="$set('create_modal',false)" wire:loading.attr="disabled">
                {{ __('site.cancel') }}
            </x-secondary-button>
        </x-slot>
        @endif
    </x-dialog-modal>
    @endcan
</div>
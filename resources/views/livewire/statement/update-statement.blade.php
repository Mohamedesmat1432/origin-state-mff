<div>
    @can('edit-statement')
    <x-dialog-modal wire:model="edit_modal" submit="save()" method="PATCH">
        @if ($this->edit_modal)
        <x-slot name="title">
            {{ __('site.update_statement') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-1 gap-4">
                <x-form.field label="{{ __('site.name') }}" model="name" placeholder="{{ __('site.name') }}" />
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
        @endif
    </x-dialog-modal>
    @endcan
</div>

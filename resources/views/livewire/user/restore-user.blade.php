<div>
    @can('restore-user')
    <x-dialog-modal wire:model="restore_modal" submit="restore" method="POST">
        @if ($this->restore_modal)
        <x-slot name="title">
            {{ __('site.restore_user') }}
        </x-slot>

        <x-slot name="content">
            <div class="my-2">
                {{ __('site.are_you_sure_to_want_restore') . $name }} .
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-indigo-button type="submit" wire:loading.attr="disabled">
                {{ __('site.restore_user') }}
            </x-indigo-button>
            <x-secondary-button class="mx-2" wire:click="$set('restore_modal',false)" wire:loading.attr="disabled">
                {{ __('site.cancel') }}
            </x-secondary-button>
        </x-slot>
        @endif
    </x-dialog-modal>
    @endcan
</div>
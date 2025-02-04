<div>
    @if ($this->import_modal)
    <x-dialog-modal wire:model.live="import_modal" submit="import()" method="POST">
        <x-slot name="title">
            {{ __('site.import_origin') }}
        </x-slot>

        <x-slot name="content">
            <div class="col-span-6 sm:col-span-4">
                <x-label for="file" value="{{ __('site.choose_file') }}" />
                <x-input type="file" class="mt-1 block w-full border p-1" wire:model.live="file" accept=".xlsx, .xls" />
                <x-input-error for="file" class="mt-2" />

                @if ($file)
                @php
                $extension = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $icons = [
                'xlsx' => asset('images/icon-excel.png'),
                'xls' => asset('images/icon-excel.png'),
                'pdf' => asset('images/icon-pdf.png'),
                'doc' => asset('images/icon-word.png'),
                'docx' => asset('images/icon-word.png'),
                ];
                $icon_image = $icons[$extension] ?? asset('images/icon-file.png');
                @endphp

                <div class="mt-4 flex items-center">
                    <img src="{{ $icon_image }}" alt="{{ $extension }} Icon" class="w-8 h-8 mr-2">
                    <span>{{ $file->getClientOriginalName() }}</span>
                </div>
                @endif
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-indigo-button type="submit" wire:loading.attr="disabled">
                {{ __('site.import') }}
            </x-indigo-button>

            <x-secondary-button class="mx-2" wire:click="$set('import_modal',false)" wire:loading.attr="disabled">
                {{ __('site.cancel') }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>
    @endif
</div>

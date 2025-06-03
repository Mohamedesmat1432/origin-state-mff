@props(['pageName'])

<div class="w-full">
    <x-slot name="title">
        {{ $pageName }}
    </x-slot>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $pageName }}
            </h2>
            <livewire:list-origin-notifier />
        </div>
    </x-slot>

    <div class="bg-gray-50 overflow-hidden shadow-xl md:p-6 min-h-screen">
        {{ $slot }}
    </div>
</div>
@props(['id' => null, 'maxWidth' => null, 'submit' => null, 'method' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    @if ($submit)
        <form wire:submit="{{ $submit }}">
            @csrf
            @method($method)
    @endif
    <div class="px-6 py-4">
        <div class="text-2xl font-medium text-gray-900 flex gap-x-2">
            <x-icon name="exclamation-triangle" class="h-8 w-8 text-red-600" />
            {{ $title ?? '' }}
        </div>

        <div class="mt-4 text-sm text-gray-600">
            {{ $content ?? '' }}
        </div>
    </div>

    <div class="flex px-6 py-4 bg-gray-100 text-right">
        {{ $footer ?? '' }}
    </div>
    @if ($submit)
        </form>
    @endif
</x-modal>

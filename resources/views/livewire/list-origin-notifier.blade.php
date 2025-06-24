<div x-data="{ open: false }" class="relative bg-white rounded-xl shadow">
    <div class="">
        <!-- Notification Bell Icon -->
        <div class="relative z-40">
            <button @click="open = !open"
                class="relative focus:outline-none flex gap-x-2 items-center p-2 justify-center">
                <!-- Heroicons bell icon -->
                <x-icon name="bell-alert" class="h-6 w-6 text-yellow-300" solid="true" />

                @if (count($notifications) > 0)
                    <span class="bg-red-600 text-white text-xs rounded-lg p-1">
                        {{ count($notifications->whereNull('read_at')) }}
                    </span>
                @endif
            </button>

            <!-- Dropdown -->
            <div x-show="open" @click.away="open = false" x-transition
                class="absolute rtl:left-0 ltr:right-0 mt-2 w-96 bg-white border rounded-lg shadow-lg z-10 max-h-80 overflow-y-auto">
                <div class="p-3 border-b text-sm font-semibold text-gray-700">{{ __('site.notifications') }}</div>
                <ul class="divide-y divide-gray-100 text-sm">
                    @forelse ($notifications as $notification)
                        <li class="p-3 hover:bg-gray-50">
                            {{ $notification->data['message'] ?? 'No message' }}<br>
                            <span class="text-xs text-gray-400">{{ $notification->created_at->diffForHumans() }}</span>
                            @if (is_null($notification->read_at))
                                <button wire:click="markAsRead('{{ $notification->id }}')"
                                    class="text-sm text-indigo-600 hover:underline">
                                    {{ __('site.mark_as_read') }}
                                </button>
                            @else
                                <span class="text-xs text-green-600">{{ __('site.read') }}</span>
                            @endif
                        </li>
                    @empty
                        <li class="p-3 text-gray-500">{{ __('site.no_notifications_found') }}</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>

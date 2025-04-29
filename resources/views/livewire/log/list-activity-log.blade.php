<div>
    <x-page-content page-name="{{ __('site.activity_logs') }}">

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="flex justify-between">
                <h1 class=" text-2xl font-medium text-gray-900">
                    {{ __('site.activity_logs') }}
                </h1>
            </div>

            <div class="mt-6 text-gray-500 leading-relaxed">
                <div class="mt-3">
                    <div class="md:flex justify-between">
                        <div class="mb-2">
                            <x-input type="search" wire:model.live.debounce.500ms="search"
                                placeholder="{{ __('site.search') }}..." />
                        </div>
                    </div>
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            <td class="p-2 border">{{__('site.id')}}</td>
                            <td class="p-2 border">{{ __('site.description') }}</td>
                            <td class="p-2 border">{{ __('site.event') }}</td>
                            <td class="p-2 border">{{ __('site.user') }}</td>
                            <td class="p-2 border">{{ __('site.properties') }}</td>
                            <td class="p-2 border">{{ __('site.date') }}</td>
                        </tr>
                    </x-slot>

                    <x-slot name="tbody">
                        @forelse ($logs as $log)
                        <tr wire:key="log-{{ $log->id }}" class="odd:bg-gray-100">
                            <td class="p-2 border">{{ $log->id }}</td>
                            <td class="p-2 border">{{ $log->description }}</td>
                            <td class="p-2 border">{{ $log->event }}</td>
                            <td class="p-2 border">
                                {{ optional($log->causer)->name ?? 'نظام' }}
                            </td>
                            <td class="p-2 border">
                                <pre
                                    class="text-xs">{{ json_encode($log->properties, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) }}</pre>
                            </td>
                            <td class="p-2 border">
                                {{ $log->created_at->format('Y-m-d H:i') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="p-2 border text-center">
                                {{ __('site.no_data_found') }}
                            </td>
                        </tr>
                        @endforelse
                    </x-slot>
                </x-table>


                @if ($logs->hasPages())
                <x-paginate :data-links="$logs->links()" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>
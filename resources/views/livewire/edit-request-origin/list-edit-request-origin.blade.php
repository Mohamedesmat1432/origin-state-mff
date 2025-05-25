<div>
    <x-page-content page-name="{{ __('site.edit_request_origins') }}">

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-md">

            <div class="text-gray-500 leading-relaxed">
                <div>
                    <div class="md:flex justify-between">
                        <x-form.field model="filters.search" placeholder="{{ __('site.search') }}" type="search"
                            :extra="['wire:model.live.debounce.300ms' => 'filters.search']" />

                        <x-form.enum-group model="filters.status"
                            :extra="['wire:model.live.debounce.200ms' => 'filters.status']"
                            :enum="\App\Enums\EditRequestOriginStatus::class" />
                    </div>
                </div>

                <x-table>
                    <x-slot name="thead">
                        <tr>
                            <td class="p-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('id')">
                                        {{ __('site.id') }}
                                    </button>
                                    <x-sort-icon sort_field="id" :sort_by="$sort['by']" :sort_asc="$sort['asc']" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('user_id')">
                                        {{ __('site.user_id') }}
                                    </button>
                                    <x-sort-icon sort_field="user_id" :sort_by="$sort['by']" :sort_asc="$sort['asc']" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    <button wire:click="sortByField('origin_id')">
                                        {{ __('site.origin_id') }}
                                    </button>
                                    <x-sort-icon sort_field="origin_id" :sort_by="$sort['by']" :sort_asc="$sort['asc']" />
                                </div>
                            </td>
                            <td class="px-4 py-2 border">
                                <div class="flex justify-center">
                                    {{ __('site.action') }}
                                </div>
                            </td>
                        </tr>
                    </x-slot>
                    <x-slot name="tbody">
                        @forelse ($requests as $request)
                        <tr wire:key="request-{{ $request->id }}" class="odd:bg-gray-100">
                            <td class="p-2 border">
                                {{ $request->id }}
                            </td>
                            <td class="p-2 border">
                                {{ $request->user?->name }}
                            </td>
                            <td class="p-2 border">
                                {{ $request->origin?->id }}
                            </td>
                            <td class="p-2 border">
                                <div class="flex justify-center gap-x-2">
                                    <button wire:click="approve('{{ $request->id }}')"
                                        class="bg-green-500 text-white p-2 rounded">
                                        {{ __('enums.edit_request_origin_status.approved') }}
                                    </button>
                                    <div class="mx-1"></div>
                                    <button wire:click="reject('{{ $request->id }}')"
                                        class="bg-red-500 text-white p-2 rounded">
                                        {{ __('enums.edit_request_origin_status.rejected') }}
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="12" class="p-2 border text-center">
                                {{ __('site.no_data_found') }}
                            </td>
                        </tr>
                        @endforelse
                    </x-slot>
                </x-table>

                @if ($requests->hasPages())
                <x-paginate :data-links="$requests->links()" :all="$count_all" />
                @endif
            </div>
        </div>
    </x-page-content>
</div>
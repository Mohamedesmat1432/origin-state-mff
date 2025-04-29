<div>
    <x-page-content page-name="{{ __('site.dashboard') }}">
        {{-- <h1 class="p-2 text-2xl font-semibold text-gray-700 text-center">
            {{ __('site.wellcome_to_dashboard') }} {{ auth()->user()->name ?? '' }}
        </h1> --}}

        <div class="p-6 lg:p-6 bg-white border-b border-gray-200 rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                @foreach ($this->dashboardLinks() as $link)
                @can($link['role'])
                <div class="dashboard_links">
                    <a wire:navigate href="{{ route($link['name']) }}">
                        <div class="{{ $link['bg'] }} {{ $link['hover'] }} rounded p-3 text-white">
                            <div class="flex text-2xl justify-between">
                                <div class="text-center">
                                    <x-icon class="w-12 h-12 text-center" name="{{ $link['icon'] }}" />
                                    <div class="mt-3">{{ $link['count'] }}</div>
                                </div>
                                <div class="text-center">
                                    <div>{{ $link['value'] }}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                @endcan
                @endforeach
            </div>
        </div>

        <div class="p-6 lg:p-6 mt-3 bg-white border-b border-gray-200 rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-5">
                @can('view-chart-user')
                <livewire:chart.chart-user />
                @endcan
                @can('view-chart-origin')
                <livewire:chart.origin-chart />
                @endcan
            </div>
        </div>
    </x-page-content>
</div>
<div>
    <x-page-content page-name="{{ __('site.dashboard') }}">
        {{-- <h1 class="p-2 text-2xl font-semibold text-gray-700 text-center">
            {{ __('site.wellcome_to_dashboard') }} {{ auth()->user()->name ?? '' }}
        </h1> --}}

        <div class="p-6 lg:p-8 bg-white border-b border-gray-200 rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-5 gap-6">
                @foreach ($this->dashboardLinks() as $link)
                    @can($link['role'])
                        <div class="dashboard_links">
                            <a wire:navigate href="{{ route($link['name']) }}">
                                <div class="{{ $link['bg'] }} {{ $link['hover'] }} rounded p-3 text-white">
                                    <div class="flex text-xl justify-between">
                                        <div class="text-center">
                                            <x-icon class="w-8 h-8 text-center" name="{{ $link['icon'] }}" solid />
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
            <div class="p-6 lg:p-8 mt-5 bg-white border-b border-gray-200 rounded-lg">
                @can('view-chart-user')
                    <livewire:chart.chart-user />
                @endcan
            </div>
            <div class="p-6 lg:p-8 mt-5 bg-white border-b border-gray-200 rounded-lg">
                @can('view-chart-origin')
                    <livewire:chart.origin-chart />
                @endcan
            </div>
        </div>

        <div class="p-6 lg:p-8 mt-5 bg-white border-b border-gray-200 rounded-lg">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">
                {{ __('site.statistics_users_departments') }}
            </h1>

            @foreach ($departmentsData as $department)
                <div class="mb-8 bg-white rounded-lg shadow p-6">
                    <h2 class="text-2xl font-semibold text-blue-600 mb-4">
                        {{ $department['department_name'] }}
                    </h2>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="text-center px-4 py-2 border-b">{{ __('site.user') }}</th>
                                    <th class="text-center px-4 py-2 border-b">{{ __('site.created') }}</th>
                                    <th class="text-center px-4 py-2 border-b">{{ __('site.revirsed') }}</th>
                                    <th class="text-center px-4 py-2 border-b">{{ __('site.completed') }}</th>
                                    <th class="text-center px-4 py-2 border-b">{{ __('site.coodinated') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($department['users'] as $user)
                                    <tr class="hover:bg-gray-50">
                                        <td class="text-center px-4 py-2 border-b">{{ $user['user_name'] }}</td>
                                        <td class="text-center px-4 py-2 border-b">{{ $user['created_count'] }}</td>
                                        <td class="text-center px-4 py-2 border-b">{{ $user['revised_count'] }}</td>
                                        <td class="text-center px-4 py-2 border-b">{{ $user['completed_count'] }}</td>
                                        <td class="text-center px-4 py-2 border-b">{{ $user['coordinated_count'] }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-gray-500">
                                            {{ __('site.no_data_in_department') }}
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{-- Users Pagination --}}
                        @php
                            $totalUserPages = ceil($department['users_total'] / $department['per_page']);
                        @endphp

                        @if ($totalUserPages > $perUserPage)
                            <div class="mt-2">
                                @for ($i = 1; $i <= $totalUserPages; $i++)
                                    <button
                                        wire:click="$set('userPages.{{ $department['department_id'] }}', {{ $i }})"
                                        class="px-2 py-1 rounded border {{ $i == $department['current_page'] ? 'bg-blue-500 text-white' : '' }}">
                                        {{ $i }}
                                    </button>
                                @endfor
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
            {{-- Departments Pagination --}}
            <div class="mt-6">
                {{ $departments->links() }}
            </div>

        </div>
    </x-page-content>
</div>

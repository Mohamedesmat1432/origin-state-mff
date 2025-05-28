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

        <div class="p-6 lg:p-8 mt-5 bg-white border-b border-gray-200 rounded-lg">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-5">
                @can('view-chart-user')
                    <livewire:chart.chart-user />
                @endcan
                @can('view-chart-origin')
                    <livewire:chart.origin-chart />
                @endcan
            </div>
        </div>

        <div class="p-6 lg:p-8 mt-5 bg-white border-b border-gray-200 rounded-lg">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">إحصائيات الإدارات والمستخدمين</h1>

            @foreach ($departmentsData as $department)
                <div class="mb-8 bg-white rounded-lg shadow p-6">
                    <h2 class="text-2xl font-semibold text-blue-600 mb-4">
                        إدارة: {{ $department['department_name'] }}
                    </h2>

                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="text-right px-4 py-2 border-b">المستخدم</th>
                                    <th class="text-right px-4 py-2 border-b">أنشأ</th>
                                    <th class="text-right px-4 py-2 border-b">راجع</th>
                                    <th class="text-right px-4 py-2 border-b">أكمل</th>
                                    <th class="text-right px-4 py-2 border-b font-bold text-green-600">الإجمالي</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($department['users'] as $user)
                                    <tr class="hover:bg-gray-50">
                                        <td class="text-right px-4 py-2 border-b">{{ $user['user_name'] }}</td>
                                        <td class="text-right px-4 py-2 border-b">{{ $user['created_count'] }}</td>
                                        <td class="text-right px-4 py-2 border-b">{{ $user['revised_count'] }}</td>
                                        <td class="text-right px-4 py-2 border-b">{{ $user['completed_count'] }}</td>
                                        <td class="text-right px-4 py-2 border-b font-semibold text-green-600">
                                            {{ $user['total_origins'] }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4 text-gray-500">لا يوجد مستخدمون في
                                            هذه الإدارة.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </x-page-content>
</div>

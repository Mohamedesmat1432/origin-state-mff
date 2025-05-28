<?php

namespace App\Livewire\Dashboard;

use App\Models\City;
use App\Models\DecisionType;
use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use App\Models\Department;
use App\Models\Government;
use App\Models\Origin;
use App\Models\Project;
use App\Models\Statement;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class DashboardComponent extends Component
{
    public function dashboardLinks()
    {
        return [
            [
                'name' => 'users',
                'value' => __('site.users'),
                'icon' => 'user-group',
                'role' => 'view-user',
                'bg' => 'bg-cyan-600',
                'hover' => 'hover:bg-cyan-700',
                'count' => User::count(),
            ],
            [
                'name' => 'roles',
                'value' => __('site.roles'),
                'icon' => 'shield-check',
                'role' => 'view-role',
                'bg' => 'bg-indigo-600',
                'hover' => 'hover:bg-indigo-700',
                'count' => Role::count(),
            ],
            [
                'name' => 'permissions',
                'value' => __('site.permissions'),
                'icon' => 'key',
                'role' => 'view-permission',
                'bg' => 'bg-purple-600',
                'hover' => 'hover:bg-purple-700',
                'count' => Permission::count(),
            ],
            [
                'name' => 'departments',
                'value' => __('site.departments'),
                'icon' => 'building-office',
                'role' => 'view-department',
                'bg' => 'bg-teal-600',
                'hover' => 'hover:bg-teal-700',
                'count' => Department::count(),
            ],
            [
                'name' => 'decision.types',
                'value' => __('site.decision_types'),
                'icon' => 'bolt',
                'role' => 'view-decision-type',
                'bg' => 'bg-amber-600',
                'hover' => 'hover:bg-amber-700',
                'count' => DecisionType::count(),
            ],
            [
                'name' => 'projects',
                'value' => __('site.projects'),
                'icon' => 'building-office-2',
                'role' => 'view-project',
                'bg' => 'bg-blue-600',
                'hover' => 'hover:bg-blue-700',
                'count' => Project::count(),
            ],
            [
                'name' => 'statements',
                'value' => __('site.statements'),
                'icon' => 'document-text',
                'role' => 'view-statement',
                'bg' => 'bg-rose-600',
                'hover' => 'hover:bg-rose-700',
                'count' => Statement::count(),
            ],
            [
                'name' => 'origins',
                'value' => __('site.origins'),
                'icon' => 'globe-europe-africa',
                'role' => 'view-origin',
                'bg' => 'bg-emerald-600',
                'hover' => 'hover:bg-emerald-700',
                'count' => Origin::count(),
            ],
            [
                'name' => 'governments',
                'value' => __('site.governments'),
                'icon' => 'map',
                'role' => 'view-government',
                'bg' => 'bg-orange-600',
                'hover' => 'hover:bg-orange-700',
                'count' => Government::count(),
            ],
            [
                'name' => 'cities',
                'value' => __('site.cities'),
                'icon' => 'building-library',
                'role' => 'view-city',
                'bg' => 'bg-lime-600',
                'hover' => 'hover:bg-lime-700',
                'count' => City::count(),
            ],
        ];
    }



    public function render()
    {
        $departments = Department::with(['users' => function ($query) {
            $query->withCount([
                'createdOrigins',
                'revisedOrigins',
                'completedOrigins',
            ])->with('department');
        }])->get();

        // ترتيب وتجهيز البيانات
        $departmentsData = $departments->map(function ($department) {
            return [
                'department_id' => $department->id,
                'department_name' => $department->name,
                'users' => $department->users->map(function ($user) {
                    $totalOrigins = $user->created_origins_count
                        + $user->revised_origins_count
                        + $user->completed_origins_count;

                    return [
                        'user_id' => $user->id,
                        'user_name' => $user->name,
                        'created_count' => $user->created_origins_count,
                        'revised_count' => $user->revised_origins_count,
                        'completed_count' => $user->completed_origins_count,
                        'total_origins' => $totalOrigins,
                    ];
                }),
            ];
        });

        return view('livewire.dashboard.dashboard-component',[
            'departmentsData' => $departmentsData
        ]);
    }
}

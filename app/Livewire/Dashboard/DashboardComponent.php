<?php

namespace App\Livewire\Dashboard;


use App\Models\{User, Permission,  Role, Department, DecisionType, Government, City, Project, Statement, Origin};
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class DashboardComponent extends Component
{
    use WithPagination;

    public $userPages = [];
    public int $perDepartmentPage = 3;
    public int $perUserPage = 2;

    protected $updatesQueryString = ['page'];

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
                'coordinatedOrigins',
            ])->with('department');
        }])->paginate($this->perDepartmentPage);

        $departmentsData = $departments->getCollection()->map(function ($department) {
            $currentPage = $this->userPages[$department->id] ?? 1;

            $paginatedUsers = $department->users
                ->forPage($currentPage, $this->perUserPage)
                ->values();

            $users = $paginatedUsers->map(function ($user) {

                return [
                    'user_id' => $user->id,
                    'user_name' => $user->name,
                    'created_count' => $user->created_origins_count,
                    'revised_count' => $user->revised_origins_count,
                    'completed_count' => $user->completed_origins_count,
                    'coordinated_count' => $user->coordinated_origins_count,
                ];
            });

            return [
                'department_id' => $department->id,
                'department_name' => $department->name,
                'users' => $users,
                'users_total' => $department->users->count(),
                'current_page' => $currentPage,
                'per_page' => $this->perUserPage,
            ];
        });

        return view('livewire.dashboard.dashboard-component', [
            'departmentsData' => $departmentsData,
            'departments' => $departments,
        ]);
    }
}

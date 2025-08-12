<?php

namespace App\Traits;

trait NavSidebarTrait
{
    public function dropdownLinks()
    {
        return [
            [
                'name' => 'profile.show',
                'value' => 'site.profile',
                'icon' => 'user',
                'role' => 'view-profile',
                'group' => 'management',
            ],
            [
                'name' => 'users',
                'value' => 'site.users',
                'icon' => 'users',
                'role' => 'view-user',
                'group' => 'management',
            ],
            [
                'name' => 'departments',
                'value' => 'site.departments',
                'icon' => 'building-office',
                'role' => 'view-department',
                'group' => 'management',
            ],
            [
                'name' => 'roles',
                'value' => 'site.roles',
                'icon' => 'shield-check',
                'role' => 'view-role',
                'group' => 'management',
            ],
            [
                'name' => 'permissions',
                'value' => 'site.permissions',
                'icon' => 'key',
                'role' => 'view-permission',
                'group' => 'management',
            ],
            [
                'name' => 'responsibilities',
                'value' => 'site.responsibilities',
                'icon' => 'receipt-percent',
                'role' => 'view-responsibility',
                'group' => 'management',
            ],
            [
                'name' => 'backup',
                'value' => 'site.backup',
                'icon' => 'inbox-stack',
                'role' => 'view-backup-database',
                'group' => 'management',
            ],
        ];
    }

    public function responsiveLinks()
    {
        return [
            [
                'name' => 'projects',
                'value' => 'site.projects',
                'icon' => 'building-office-2',
                'role' => 'view-project',
                'group' => 'program',
            ],
            [
                'name' => 'statements',
                'value' => 'site.statements',
                'icon' => 'document-text',
                'role' => 'view-statement',
                'group' => 'program',
            ],
            [
                'name' => 'job.titles',
                'value' => 'site.job_titles',
                'icon' => 'receipt-percent',
                'role' => 'view-job-title',
                'group' => 'program',
            ],
            [
                'name' => 'service.types',
                'value' => 'site.type_services',
                'icon' => 'bolt',
                'role' => 'view-type-service',
                'group' => 'program',
            ],
            [
                'name' => 'decision.types',
                'value' => 'site.decision_types',
                'icon' => 'bolt',
                'role' => 'view-decision-type',
                'group' => 'program',
            ],
            [
                'name' => 'origins',
                'value' => 'site.origins',
                'icon' => 'globe-europe-africa',
                'role' => 'view-origin',
                'group' => 'program',
            ],
            [
                'name' => 'edit.request.origin',
                'value' => 'site.edit_request_origins',
                'icon' => 'arrow-path-rounded-square',
                'role' => 'view-edit-request-origin',
                'group' => 'program',
            ],
        ];
    }
}

<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'project_create',
            ],
            [
                'id'    => 18,
                'title' => 'project_show',
            ],
            [
                'id'    => 19,
                'title' => 'project_delete',
            ],
            [
                'id'    => 20,
                'title' => 'project_access',
            ],
            [
                'id'    => 26,
                'title' => 'task_create',
            ],
            [
                'id'    => 27,
                'title' => 'task_edit',
            ],
            [
                'id'    => 28,
                'title' => 'task_show',
            ],
            [
                'id'    => 29,
                'title' => 'task_delete',
            ],
            [
                'id'    => 30,
                'title' => 'task_access',
            ],
            [
                'id'    => 31,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}

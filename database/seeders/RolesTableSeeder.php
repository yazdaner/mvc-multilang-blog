<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'superAdmin',
            'display_name' => 'مدیر',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'admin',
            'display_name' => 'ادمین',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'writer',
            'display_name' => 'نویسنده',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'teacher',
            'display_name' => 'استاد',
            'guard_name' => 'web'
        ]);
    }
}

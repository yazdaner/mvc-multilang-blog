<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'dashboard',
            'display_name' => 'داشبورد',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'users',
            'display_name' => 'کاربران',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'comments',
            'display_name' => 'کامنت',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'categories',
            'display_name' => 'دسته بندی',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'tags',
            'display_name' => 'تگ',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'posts',
            'display_name' => 'پست',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'news',
            'display_name' => 'خبر',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'events',
            'display_name' => 'رویداد',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'galleries',
            'display_name' => 'گالری',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'sliders',
            'display_name' => 'اسلایدر',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'professors',
            'display_name' => 'اساتید',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'FAQ',
            'display_name' => 'سوالات متداول',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'aboutUs',
            'display_name' => 'درباره ما',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'contactUs',
            'display_name' => 'تماس با ما',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'settings',
            'display_name' => 'تنظیمات',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'footer',
            'display_name' => 'فوتر',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'data',
            'display_name' => 'آمار',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'information',
            'display_name' => 'اطلاعات',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'lessons',
            'display_name' => ' درس ها',
            'guard_name' => 'web'
        ]);
    }
}

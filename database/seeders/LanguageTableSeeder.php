<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'name' => 'fa',
            'display_name' => 'فارسی',
            'direction' => 'rtl'
        ]);
        Language::create([
            'name' => 'en',
            'display_name' => 'English',
            'direction' => 'ltr'
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class InsertSuperAdmin extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'yazdan',
            'email' => 'yazdaner8@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12341234'),
        ]);

        $user->syncRoles('superAdmin');
    }
}

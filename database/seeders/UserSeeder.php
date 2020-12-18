<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@siexpo.com',
            'password' => Hash::make('12345'),
            'role' => User::ADMIN_ROLE
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@siexpo.com',
            'password' => Hash::make('12345'),
            'role' => User::USER_ROLE
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'brian.caballero1204@gmail.com',
            'password' => Hash::make('qwaszx1234'),
            'phone' => '09175666759',
            'isadmin' => true
        ]);
    }
}

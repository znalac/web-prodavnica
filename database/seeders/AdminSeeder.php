<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('1111111');
        $user= User::create([
            'name' => 'Admin User',
            'email' => 'admin@cms.com',
            'password' => $password
        ]);

        $user->assignRole('admin');
    }
}

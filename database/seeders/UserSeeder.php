<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'first_name' => 'admin',
            'last_name' => 'i am',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'), // password
            'remember_token' => Str::random(10),
            'terms_accepted' => true,
        ]);

        // not implemented yet
        // $admin->assignRole('admin');

        $user = User::create([
            'first_name' => 'user',
            'last_name' => 'will be',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'), // password
            'remember_token' => Str::random(10),
            'terms_accepted' => true,
        ]);

        $user = User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'), // password
            'remember_token' => Str::random(10),
            'terms_accepted' => true,
        ]);

        // not implemented yet
        // $user->assignRole('user');

        User::factory()->count(7)->create();
    }
}

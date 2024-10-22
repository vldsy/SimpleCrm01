<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Enums\RoleEnum;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // cannot use, the table is referenced in foreign key constraint
        //User::truncate();

        $admin = User::create([
            'first_name' => 'admin',
            'last_name' => 'i am',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'), // password
            'remember_token' => Str::random(10),
            'terms_accepted' => true,
        ]);

        $admin->assignRole(RoleEnum::ADMIN);
        // better to use syncRoles(RoleEnum::ADMIN);
        // to remove previous roles if assigned

        $user1 = User::create([
            'first_name' => 'user',
            'last_name' => 'will be',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'), // password
            'remember_token' => Str::random(10),
            'terms_accepted' => true,
        ]);

        $user2 = User::create([
            'first_name' => 'John',
            'last_name' => 'Doe',
            'email' => 'johndoe@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('12345'), // password
            'remember_token' => Str::random(10),
            'terms_accepted' => true,
        ]);

        $user1->assignRole(RoleEnum::USER);
        $user2->assignRole(RoleEnum::USER);

        User::factory()->count(7)->create();
    }
}

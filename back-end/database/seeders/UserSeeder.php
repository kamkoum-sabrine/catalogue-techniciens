<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'first_name' => "admin",
            'last_name' => "admin",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => Str::random(5),
            'email' => "admin@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "technicien1",
            'last_name' => "1",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => Str::random(5),
            'email' => "technicien1@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "technicien2",
            'last_name' => "2",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => Str::random(5),
            'email' => "technicien2@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Ahmed",
            'last_name' => "Ben Admed",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => Str::random(5),
            'email' => "ahmedbenahmed@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Sabrine",
            'last_name' => "Kamkoum",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => Str::random(5),
            'email' => "sabrinekamkoum@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Mohamed",
            'last_name' => "Ben Salah",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => Str::random(5),
            'email' => "mohamedbensalah@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        // DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [1, 1]);

    }
}

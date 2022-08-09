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
            'adresse' => "Près de Hopital Ras Jebel",
            'email' => "admin@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Ali",
            'last_name' => "Ben Salah",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Hay essomaa Ras Jebel",
            'email' => "alibensalah@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            
        ]);
        \App\Models\User::create([
            'first_name' => "Mohamed",
            'last_name' => "Gharbi",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Jabli Rad Jebel",
            'email' => "mohamedgharbi@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Ahmed",
            'last_name' => "Boufahja",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Demna Metline",
            'email' => "ahmedboufahja@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Manel",
            'last_name' => "Gasmi",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Dhhar Ayed Rafraf",
            'email' => "manelgasmi@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Oumaima",
            'last_name' => "Ben ALi",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Lahmeri Rafraf",
            'email' => "oumaimabenali@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Monji",
            'last_name' => "Lahmer",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Mosquée Ferdaous Ras Jebel",
            'email' => "monjilahmer@example.com",
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
            'adresse' => "Sounine",
            'email' => "mohamedbensalah@example.com",
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
            'adresse' => "STEG Ras Jebel",
            'email' => "ahmedbenahmed@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Layane",
            'last_name' => "Gharbi",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "STEG Ras Jebel",
            'email' => "layanegharbi@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Wassim",
            'last_name' => "Fraj",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "STEG Ras Jebel",
            'email' => "wassimfraj@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Mehrez",
            'last_name' => "Dridi",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "STEG Ras Jebel",
            'email' => "mehrezdridi@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Hedi",
            'last_name' => "Ben Ahmed",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "STEG Ras Jebel",
            'email' => "hedibenahmed@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Amine",
            'last_name' => "Charbib",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Metline",
            'email' => "aminecharbib@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Houssem",
            'last_name' => "Bennejma",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Avenue 14 Janvier Ras Jebel",
            'email' => "houssembennejma@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Mohsen",
            'last_name' => "Gaied",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Ras Jebel",
            'email' => "mohsengaied@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Mohamed",
            'last_name' => "Hamza",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Ras Jebel",
            'email' => "mohamedhamza@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Mohsen",
            'last_name' => "Mohamed",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Ras Jebel",
            'email' => "mohsenmohamed@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Mohsen",
            'last_name' => "Hamza",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Ras Jebel",
            'email' => "mohsenhamza@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Mourad",
            'last_name' => "Arbi",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Ras Jebel",
            'email' => "mouradarbi@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Bilel",
            'last_name' => "Ben Salem",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Ras Jebel",
            'email' => "bilelbensalem@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Bassem",
            'last_name' => "Ben Salem",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Ras Jebel",
            'email' => "bassembensalem@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Mohamed Ali",
            'last_name' => "Ben Ali",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Ras Jebel",
            'email' => "mohamedbenali@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Ibrahim",
            'last_name' => "Ben Saleh",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Ras Jebel",
            'email' => "ibrahimbensalah@example.com",
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
            'adresse' => "Près Hopital Ras Jebel",
            'email' => "sabrinekamkoum@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\User::create([
            'first_name' => "Mohamed",
            'last_name' => "Kamkoum",
            'cin' => rand(10000000,99999999),
            'phone_number' => rand(10000000,99999999),
            'birth_date' =>null,
            'adresse' => "Sidi Laarbi Ras Jebel",
            'email' => "mohamedkamkoum@example.com",
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        // DB::insert('insert into role_user (user_id, role_id) values (?, ?)', [1, 1]);

    }
}

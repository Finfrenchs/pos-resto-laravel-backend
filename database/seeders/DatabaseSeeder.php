<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Donatelo Mcdonald',
            'email' => 'donatelo@cashier.com',
            'password' => Hash::make('12345678'),
            'phone' => '987698797896',
            'roles' => 'user',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'M. Kelvin M.F',
            'email' => 'kelvin@admin.com',
            'password' => Hash::make('admin123'),
            'phone' => '085879678976',
            'roles' => 'admin',
        ]);
    }
}

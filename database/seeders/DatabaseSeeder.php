<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Artisan::call('permission:create-role', ['name' => 'user']);
        Artisan::call('permission:create-role', ['name' => 'admin']);

        $user = User::create([
          'name' => 'admin',
          'email' => 'admin@admin.com',
          'password' => Hash::make('admin')
        ]);

        $user->assignRole('admin');

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

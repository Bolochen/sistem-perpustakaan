<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Buku;
use App\Models\User;
use App\Models\Category;
use App\Models\Mahasiswa;
use App\Models\Pinjamkembali;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Bolo',
            'password' => bcrypt('12345')
        ]);

        User::Factory(5)->create();
        Mahasiswa::Factory(20)->create();
        Category::Factory(5)->create();
        Buku::Factory(10)->create();
        Pinjamkembali::Factory(10)->create();
    }
}

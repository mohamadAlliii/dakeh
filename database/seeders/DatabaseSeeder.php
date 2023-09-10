<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Advertising;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
//        \App\Models\User::factory()->create([
//            'fullName' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
//        $this->call(attributesTableSeeder::class);
//        $this->call(commentsTableSeeder::class);
        $this->call(userTableSeeder::class);
//        $this->call(categoriesTableSeeder::class);
//        $this->call(addresstableseeder::class);
//        $this->call(advertisingsTableSeeder::class);
    }
}

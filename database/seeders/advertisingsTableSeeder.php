<?php

namespace Database\Seeders;

use App\Models\Advertising;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class advertisingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Advertising::factory(5)->create();
    }
}

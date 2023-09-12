<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use Database\Seeders\StandardSeeder;
use App\Models\Guardian;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
    

        Student::factory(10)->has(Guardian::factory()->count(2))->create();

        $this->call(StandardSeeder::class);
    }
}

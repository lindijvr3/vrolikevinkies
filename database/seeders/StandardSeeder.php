<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Standard;

class StandardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=collect();
        for($i=2; $i<10; $i++){
            $data->push([

                'name'=>"Std {$i}",
                'class_number'=>$i,  
            ]
            );
        }
        Standard::factory()->createMany($data);
    }
}

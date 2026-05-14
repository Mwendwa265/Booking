<?php

namespace Database\Seeders;

use App\Models\Vehicle;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
            //personal
        Vehicle::create ([
           'brand'=>'Toyota',
           'type'=>'Saloon',
           'model'=>'Axio',
           'price_per_day'=> 3000.00,
           'number_plate'=>'KDM 300K',
           'availability_status'=> 'available',
        ]);

         Vehicle::create ([  
           'brand'=>'BMW',
           'type'=>'Convertable',
           'model'=>'4 series',
           'price_per_day'=> 10000.00,
           'number_plate'=>'KDK 411M',
           'availability_status'=> 'available',
        ]);
           
            //tours
        Vehicle::create ([      
           'brand'=>'Toyota',
           'type'=>'Convertable',
           'model'=>'landcruser 4x4',
           'price_per_day'=> 26000.00,
           'number_plate'=>'KDB 243v',
           'availability_status'=> 'available',
        ]);

        Vehicle::create ([         
           'brand'=>'Toyota',
           'type'=>'Convertable',
           'model'=>'custom',
           'price_per_day'=> 15000.00,
           'number_plate'=>'KCF 111J',
           'availability_status'=> 'available',
        ]);

       

        
    }
}

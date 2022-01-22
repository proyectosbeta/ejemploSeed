<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Empleado;

class EmpleadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run(): void
    {
        $LIMIT = 5000;
        $data  = [];
        
        for($i = 0; $i < $LIMIT; $i++){
            $faker  = Faker::create('App\Models\Empleado');
            $data[] = [
                'nombre'     => $faker->firstname,
                'apellido'   => $faker->lastname,
                'email'      => $faker->email,
                'created_at' => now()->toDateTimeString(),
                'updated_at' => now()->toDateTimeString(),
            ];
        }

        // Test 1.
        foreach ($data as $empleado){
            Empleado::insert($empleado);
        }

        // Test 2.
        // $chunks = array_chunk($data, $LIMIT);
        // foreach ($chunks as $chunk){
        //     Empleado::insert($chunk);
        // }
    }
}
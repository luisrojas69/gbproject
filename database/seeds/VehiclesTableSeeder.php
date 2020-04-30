<?php

use Illuminate\Database\Seeder;

class VehiclesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Vehicle::create([
        	'plate' => 'ABC123',
        	'color' => 'MULTICOLOR',
        	'mark' => 'CHEVROLET',
        	'model' => 'BLAZER',
        	'comment' => 'Comentario de Prueba',
        ]);

        factory(App\Vehicle::class, 10)->create();
    }
}

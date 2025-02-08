<?php

namespace Database\Seeders;

use Carbon\Carbon;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IngredienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingredientes')->insert([
            'nombre' => 'Tomate',
            'imagen' => 'tomate.jpg',
            'descripcion' => 'Un tomate es la baya de la planta Solanum lycopersicum, perteneciente a la familia de las solanáceas. Originaria de América, se ha extendido por todo el mundo y hay muchas variedades cultivadas.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('ingredientes')->insert([
            'nombre' => 'Cebolla',
            'imagen' => 'cebolla.jpg',
            'descripcion' => 'La cebolla es una planta herbácea bienal perteneciente a la familia de las amarilidáceas. Es una de las hortalizas más antiguas y populares en todo el mundo.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}

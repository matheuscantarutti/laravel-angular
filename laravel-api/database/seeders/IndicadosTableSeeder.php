<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Indicado;

class IndicadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Indicado::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {

            Indicado::create([
                'nome' => $faker->name,
                'cpf' => $faker->regexify('/\d{11}/'),
                'telefone'=> $faker->phoneNumber,
                'email' => $faker->email
            ]);
        }
    }
}

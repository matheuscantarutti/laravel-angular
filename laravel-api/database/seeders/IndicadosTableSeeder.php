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

        $faker = \Faker\Factory::create('pt_BR');

        for ($i = 0; $i < 27 ; $i++) {

            Indicado::create([
                'nome' => $faker->name,
                'cpf' => $faker->cpf(false),
                'telefone'=> $faker->phoneNumber,
                'email' => $faker->email
            ]);
        }
    }
}

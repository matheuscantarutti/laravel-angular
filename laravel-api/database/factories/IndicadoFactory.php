<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Indicado>
 */
class IndicadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create('pt_BR');
        return [
            'nome' => $faker->name,
            'cpf' => $faker->cpf(false),
            'telefone'=> $faker->phoneNumber,
            'email' => $faker->email
        ];
    }
}

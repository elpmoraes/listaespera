<?php

namespace Database\Factories;

use App\Models\ListaJogo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
class ListaJogoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ListaJogo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'descricao' => $this->faker->name,
        'datahora' =>  now(),
        'endereco' => $this->faker->address,
        'cidade' => 'Araruama',
        'gmaps' => 'maps.google.com.br',
        'inscritos' => 1,
        'maxinscritos' => 50,
        'dataabertura' => now(),
        'listavisivel' => 'S',
        'codlista' => 'AB123',
        'ativo' => 'S'
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [

            ];
        });
    }
}

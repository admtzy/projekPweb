<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PupukFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Pupuk::class;
    public function definition(){
        return [
            'nama'=>$this->faker->randomElement(['Urea','NPK','KCL']),
            'stok_kg'=>$this->faker->numberBetween(100,1000),
            'dosis_kg_per_ha'=>$this->faker->randomFloat(2,50,300),
            'harga_per_kg'=>$this->faker->randomFloat(2,1000,5000)
        ];
    }
}

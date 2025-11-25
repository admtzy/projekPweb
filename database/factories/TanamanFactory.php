<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TanamanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = \App\Models\Tanaman::class;
    public function definition(){
        $name = $this->faker->randomElement(['Bayam','Kangkung','Kentang','Bawang Merah','Cabai']);
        return [
            'nama'=>$name,
            'deskripsi'=>$this->faker->sentence(),
            'suhu_min'=>$this->faker->numberBetween(10,15),
            'suhu_max'=>$this->faker->numberBetween(25,30),
            'curah_hujan_min'=>$this->faker->numberBetween(50,80),
            'curah_hujan_max'=>$this->faker->numberBetween(150,300),
            'musim_saran'=>'Januari-Februari'
        ];
    }
}

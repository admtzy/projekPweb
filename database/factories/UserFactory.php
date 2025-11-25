<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;
    public function definition(){
        $pw = 'password';
        return [
            'name'=>$this->faker->name(),
            'email'=>$this->faker->unique()->safeEmail(),
            'password'=>Hash::make($pw),
            'role'=>'petani',
            'remember_token'=>Str::random(10),
        ];
    }
}

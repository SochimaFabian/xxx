<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'about_me' => $this->faker->paragraph,
            'date_of_birth' => $this->faker->date,
            'location' => $this->faker->country,
            'user_id' => User::factory()->create()->id,
            'link' => $this->faker->url,
            'ipaddress' => $this->faker->ipv4,
            'name' => $this->faker->name
        ];
    }
}

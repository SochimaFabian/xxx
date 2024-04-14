<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Auth;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profile>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userCount = User::all()->count();
        $randValue = rand(2, 10) . '.jpg';
        $imageName = 'images/post/preview_' . $randValue;
        return [
            'description' => $this->faker->paragraph,
            'user_id' => rand(1, User::all()->count()),
            'image' =>$imageName
        ];
    }
}

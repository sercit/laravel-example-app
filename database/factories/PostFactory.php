<?php

namespace Database\Factories;

use App\Enum\PostStatusEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author_id' => User::factory(),
            'title' => $this->faker->sentence,
            'text' => $this->faker->text,
            'status' => collect([PostStatusEnum::Draft, PostStatusEnum::Published])->random(),
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\MemberTag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MemberTag>
 */
class MemberTagFactory extends Factory
{
    protected $model = MemberTag::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tag' => $this->faker->word,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;
use App\Models\Quiz;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    protected $model = Question::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'quiz_id' => Quiz::factory(),
            'text' => $this->faker->sentence(6),  // ランダムな質問文
            'image' => $this->faker->imageUrl(),  // ランダムな画像URL
            'supplement' => $this->faker->optional()->sentence(),  // 補足説明（任意）
        ];
    }
}

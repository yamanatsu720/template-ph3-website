<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;  
use App\Models\Choice; 

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ITクイズとAさんクイズを1件ずつ生成
        $itQuiz = Quiz::create(['name' => 'ITクイズ']);
        $aQuiz = Quiz::create(['name' => 'Aさんクイズ']);

        // それ以外のランダムなダミーデータを98件生成
        Quiz::factory()
            ->count(98)
            ->hasQuestions(5) // 各クイズに5個の質問を追加
            ->create();

        // ITクイズとAさんクイズに特定の質問と選択肢を追加
        $this->addItQuizQuestions($itQuiz);
        $this->addAQuizQuestions($aQuiz);
    }

    private function addItQuizQuestions($quiz)
    {
        $questions = [
            [
                'image' => '/images/q1.jpg',
                'text' => '日本のIT人材が2030年には最大どれくらい不足すると言われているでしょうか？',
                'supplement' => null,
                'choices' => [
                    ['text' => '約79万人', 'is_correct' => false],
                    ['text' => '約28万人', 'is_correct' => false],
                    ['text' => '約183万人', 'is_correct' => true],
                ]
            ],
            [
                'image' => '/images/q2.jpg',
                'text' => '既存業界のビジネスと、先進的なテクノロジーを結びつけて生まれた、新しいビジネスのことをなんと言うでしょう？',
                'supplement' => null,
                'choices' => [
                    ['text' => 'INTECH', 'is_correct' => false],
                    ['text' => 'BIZZTECH', 'is_correct' => false],
                    ['text' => 'X-TECH', 'is_correct' => true],
                ]
            ],
            [
                'image' => '/images/q3.jpg',
                'text' => 'IoTとは何の略でしょう？',
                'supplement' => null,
                'choices' => [
                    ['text' => 'Internet of Things', 'is_correct' => true],
                    ['text' => 'Information on Tool', 'is_correct' => false],
                    ['text' => 'Integrate into Technology', 'is_correct' => false],
                ]
            ],
        ];

        foreach ($questions as $q) {
            $question = Question::create([
                'quiz_id' => $quiz->id,
                'image' => $q['image'],
                'text' => $q['text'],
                'supplement' => $q['supplement']
            ]);

            foreach ($q['choices'] as $c) {
                Choice::create([
                    'question_id' => $question->id,
                    'text' => $c['text'],
                    'is_correct' => $c['is_correct']
                ]);
            }
        }
    }

    private function addAQuizQuestions($quiz)
    {
        $questions = [
            [
                'image' => '/images/a1.jpg',
                'text' => '出身地はどこでしょう？',
                'supplement' => null,
                'choices' => [
                    ['text' => '東京', 'is_correct' => true],
                    ['text' => 'ハワイ', 'is_correct' => false],
                    ['text' => 'ロンドン', 'is_correct' => false],
                ],
            ],
            [
                'image' => '/images/a2.jpg',
                'text' => '在籍中の大学はどこでしょう？',
                'supplement' => null,
                'choices' => [
                    ['text' => '慶應義塾大学', 'is_correct' => true],
                    ['text' => 'ハーバード大学', 'is_correct' => false],
                    ['text' => 'トロント大学', 'is_correct' => false],
                ],
            ],
            [
                'image' => '/images/a3.jpg',
                'text' => '動物に例えるとなんと言われることが多いでしょう？',
                'supplement' => null,
                'choices' => [
                    ['text' => '猫', 'is_correct' => true],
                    ['text' => '犬', 'is_correct' => false],
                    ['text' => 'コアラ', 'is_correct' => false],
                ],
            ],
        ];

        foreach ($questions as $q) {
            $question = Question::create([
                'quiz_id' => $quiz->id,
                'image' => $q['image'],
                'text' => $q['text'],
                'supplement' => $q['supplement']
            ]);

            foreach ($q['choices'] as $c) {
                Choice::create([
                    'question_id' => $question->id,
                    'text' => $c['text'],
                    'is_correct' => $c['is_correct']
                ]);
            }
        }
    }
}

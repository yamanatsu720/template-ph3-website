<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // 他のシーダーがあればここに追加します
        $this->call(QuizSeeder::class);
    }
}
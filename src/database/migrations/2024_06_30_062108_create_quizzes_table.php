<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('カテゴライズしたクイズ名 ex.) ITクイズ');
            $table->timestamps();
            $table->softDeletes(); // deleted_atカラムを追加
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('quizzes', function (Blueprint $table) {
            $table->dropSoftDeletes(); // カラムを削除
        });

        Schema::dropIfExists('quizzes'); // テーブルを削除
    }
}

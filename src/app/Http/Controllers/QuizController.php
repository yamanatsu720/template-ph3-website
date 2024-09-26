<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    public function index()
    {
        // モデルからデータを取得する方法
        // $quiz = Quiz::find(1); idが1のデータを1件取得する、マッチしない場合はnullを返す
        // $quiz = Quiz::findOrFail(1); idが1のデータを1件取得する、マッチしない場合は例外を投げる
        // $quiz = Quiz::first(); 最初の1件を取得する、マッチしない場合はnullを返す
        // $quizzes = Quiz::all(); 全てのデータを取得してCollection (コレクションはLaravel固有の機能) を返す、マッチしない場合は空のコレクションを返す
        // $quiz = Quiz::find($id);
        // デバックっていうのは、プログラムの実行過程を追跡して、問題ないかを確認すること
        // 今まではvar_dump()を使って変数の中身などを覗いていたが、Laravelではdd()を使う
        // return view('quizzes.show', compact('quiz'));

        // quizzesテーブルからすべてのクイズを取得
        $quizzes = Quiz::all();

        // クイズ一覧ビューを返す
        return view('quizzes.index', compact('quizzes'));
    }

    public function show($id)
    {
        $quiz = Quiz::with('questions')->findOrFail($id);
        return view('quizzes.show', compact('quiz'));
    }

    public function edit($id)
    {
        $quiz = Quiz::where('id', $id)->first();
        return view('quizzes.edit',compact('quiz'));
    }
    

    public function update($id, Request $request)
    {
        $quiz = Quiz::where('id', $id)->first();
        $quiz->update([
            'name'=> $request->name
        ]);
        return redirect('/quizzes')->with('message','更新しました！');
    }

    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect('/quizzes')->with('message', '削除しました！');
    }
}


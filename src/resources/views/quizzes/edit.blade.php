<!DOCTYPE html>
<html>
<head>
    <title>クイズ編集</title>
</head>
<body>
    <h1>クイズ編集</h1>

    {{-- バリデーションエラーの表示 --}}
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- クイズタイトル編集フォーム --}}
    <form action="{{route('quizzes.update',['id' => $quiz->id])}}" method="POST">
        @csrf
        @method('PUT') {{-- PUTメソッドを指定 --}}
        
        <div>
            <label for="name">クイズタイトル</label>
            {{-- old('name') で入力値を保持。なければ現在のタイトルを表示 --}}
            <input type="text" id="name" name="name" value="{{ old('name', $quiz->name) }}" required>
        </div>

        <div>
            <button type="submit">更新</button>
        </div>
    </form>

    {{-- クイズ一覧に戻るリンク --}}
    <a href="{{ route('quizzes') }}">クイズ一覧に戻る</a>
</body>
</html>

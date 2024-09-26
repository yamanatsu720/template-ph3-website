<!DOCTYPE html>
<html>
<head>
    <title>{{ $quiz->name }}</title>
    <style>
        .update-message {
            color: green;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    {{-- 更新メッセージを表示する領域 --}}
    <div id="message"></div>

    <h1>{{ $quiz->name }}</h1>

    <ul>
        @foreach ($quiz->questions as $question)
            <li>
                <h3>{{ $question->text }}</h3>
                <ul>
                    @foreach ($question->choices as $choice)
                        {{-- data-correct 属性に is_correct の値を埋め込む --}}
                        <li class="choice" data-correct="{{ $choice->is_correct }}">{{ $choice->text }}</li>
                    @endforeach
                </ul>
                {{-- 結果を表示するためのdiv --}}
                <div class="result"></div>
            </li>
        @endforeach
    </ul>

    
    <script>
        // 全ての選択肢を取得してクリックイベントを設定
        const choices = document.querySelectorAll('.choice');
        
        choices.forEach(choice => {
            choice.addEventListener('click', function () {
                const isCorrect = this.getAttribute('data-correct'); // data-correct属性から正誤を取得
                const resultDiv = this.parentNode.nextElementSibling; // 結果を表示するdiv

                // 正誤を表示
                if (isCorrect == 1) {
                    resultDiv.textContent = '正解です！';
                    resultDiv.style.color = 'green';
                } else {
                    resultDiv.textContent = '不正解です。';
                    resultDiv.style.color = 'red';
                }
            });
        });

    </script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>
</html>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('クイズ一覧') }}
        </h2>
    </x-slot>
    <div class="py-12">
    @if(session('message'))
    <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50" role="alert">
    {{ session('message')}}
    </div>
    @endif
        <ul>
            @foreach ($quizzes as $quiz)
                <li><a href="{{ route('quizzes.show', $quiz->id) }}">{{ $quiz->name }}</a></li>
                <li><a href="{{ route('quizzes.edit', $quiz->id) }}">編集</a></li>
                <form method="POST" action="{{ route('quizzes.destroy', ['id' => $quiz->id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" onclick="return window.confirm('削除しますか？');">
                        <span>削除</span>
                    </button>
                </form>
            @endforeach
        </ul>
    </div>
    <!-- <script>
        document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function() {
            const quizId = this.getAttribute('data-id');
            const modal = document.getElementById('deleteModal');
            modal.style.display = 'block';

            document.getElementById('confirmDelete').onclick = function() {
                fetch(`/quizzes/${quizId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                }).then(response => {
                    if (response.ok) {
                        location.reload();
                    }
                });
            };

            document.getElementById('cancelDelete').onclick = function() {
                modal.style.display = 'none';
            };
        });
    });
    </script> -->
</x-app-layout>

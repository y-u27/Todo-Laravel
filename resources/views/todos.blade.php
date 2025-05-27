<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Todo by Laravel</title>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="flex flex-col items-center space-y-6">
    <h1 class="text-3xl font-bold text-center">Todo</h1>

    @if ($errors->any())
    <div>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    <!-- Todo入力フォーム -->
    <form class="flex flex-row gap-4 bg-white p-8 rounded-xl shadow-lg w-220" action="/todos" method="POST">
      @csrf
      <div>
        <label class="mb-1 text-gray-700">タイトル：</label>
        <input class="w-full p-2 border-2 border-indigo-400 rounded-md" type="text" name="title">
      </div>
      <div>
        <label>内容：</label>
        <input class="w-full p-2 border-2 border-indigo-400 rounded-md" type="text" name="contents">
      </div>
      <div>
        <label class="mb-1 text-gray-700">ステータス：</label>
        <select class="w-full p-2 boder-2 border-indigo-400 rounded-md appearance-none" name="status">
          <option value="0">未完了</option>
          <option value="1">進行中</option>
          <option value="2">完了</option>
        </select>
      </div>
      <button class="h-10 w-20 mt-6 bg-indigo-500 text-white rounded-md hover:bg-indigo-600 transition">追加</button>
    </form>

    <!-- Todo一覧 -->
    <div class="flex flex-col gap-4 items-center w-full mt-8">
      @foreach ($todos as $todo)
      <div class="bg-white rounded-xl shadow-lg px-8 py-6 w-full max-w-3xl">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
          <div class="text-gray-700">
            <p><strong>タイトル：</strong>{{ $todo->title }}</p>
            <p><strong>内容：</strong>{{ $todo->contents }}</p>
            <p><strong>ステータス</strong>
              @if ($todo->status == 0)
              未完了
              @elseif ($todo->status == 1)
              進行中
              @else
              完了
              @endif
            </p>
          </div>
          <div class="flex justify-end space-x-3 mt-1">
            <button class="px-4 py-1 bg-indigo-300 text-white rounded-md" type="button"><a href="{{ route('todos.edit', $todo->id ) }}">編集</a></button>

            <!-- 削除フォーム -->
            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか');">
              @csrf
              @method('DELETE')
              <button type="submit" class="px-4 py-1 bg-red-400 text-white rounded-md">削除</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div>
      <a href="{{ url('/login') }}" class="block text-center mt-4 text-gray-600 hover:underline">ログアウト</a>
    </div>
  </div>
</body>

</html>
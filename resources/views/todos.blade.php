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

    <!-- Todo入力フォーム -->
    <form class="flex flex-col gap-4 bg-white p-8 rounded-xl shadow-lg w-80" action="/todos" method="POST">
      @csrf
      <div>
        <label class="mb-1 text-gray-700">タイトル：</label>
        <input class="w-full p-2 border-2 border-indigo-400 rounded-md" type="text" name="title">
      </div>
      <div>
        <label class="mb-1 text-gray-700">ステータス：</label>
        <select class="w-full p-2 boder-2 border-indigo-400 rounded-md appearance-none" name="status">
          <option value="0">未完了</option>
          <option value="1">進行中</option>
          <option value="2">完了</option>
        </select>
      </div>
      <div>
        <label>内容：</label>
        <input class="w-full p-2 border-2 border-indigo-400 rounded-md" type="text" name="contents">
      </div>
      <button class="mt-4 bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 transition">追加</button>
    </form>

    <!-- Todo一覧 -->
    <div class="flex flex-col gap-4 bg-white p-8 rounded-xl shadow-lg w-80 divide-y divide-gray-100">
      <ul>
        @foreach ($todos as $todo)
        <li class="mb-1 text-gray-700">タイトル：{{ $todo->title }}</li>
        <li class="mb-1 text-gray-700">内容：{{ $todo->contents }}</li>
        <li class="mb-1 text-gray-700">ステータス：
          @if ($todo->status == 0)
          未完了
          @elseif ($todo->status == 1)
          進行中
          @else
          完了
          @endif
        </li>
        <div class="flex items-center justify-center space-x-5 mt-3 mb-3">
          <button class="px-4 py-1 bg-indigo-300 text-white rounded-md" type="button">編集</button>
          <button class="px-4 py-1 bg-teal-300 text-white rounded-md">削除</button>
        </div>
        @endforeach
      </ul>
    </div>
  </div>
</body>

</html>
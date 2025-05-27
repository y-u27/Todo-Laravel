<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>Todo詳細</title>
</head>


<body class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="flex flex-col items-center space-y-6">
    <h1 class="text-3xl font-bold text-center">Todoを編集・削除</h1>

    @if ($errors->any())
    <div>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif
    
    <!-- 更新フォーム -->
    <form class="flex flex-col gap-4 bg-white p-8 rounded-xl shadow-lg w-80" action="{{ route('todos.update', $todo->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div>
        <label class="mb-1 text-gray-700">タイトル：</label>
        <input class="w-full p-2 border-2 border-indigo-400 rounded-md" name="title" value="{{ old('title', $todo->title ) }}">
      </div>
      <div>
        <label>内容：</label>
        <input class="w-full p-2 border-2 border-indigo-400 rounded-md" name="contents" value="{{ old('contents', $todo->contents) }}">
      </div>
      <div>
        <label class="mb-1 text-gray-700">ステータス：</label>
        <select class="w-full p-2 boder-2 border-indigo-400 rounded-md appearance-none" name="status">
          <option value="0" @selected($todo->status === 0)>未完了</option>
          <option value="1" @selected($todo->status === 1)>進行中</option>
          <option value="2" @selected($todo->status === 2)>完了</option>
        </select>
      </div>
      <button type="submit" class="mt-4 bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 transition">更新</button>
    </form>

    <!-- Todo一覧に戻る -->
    <a href="{{ url('/todos') }}" class="block text-center mt-4 text-gray-600 hover:underline">一覧に戻る</a>
  </div>
</body>

</html>
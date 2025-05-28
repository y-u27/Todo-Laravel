<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <title>ログイン</title>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
  <div class="flex flex-col items-center space-y-6">
    <h1 class="text-3xl font-bold text-center">ログイン</h1>

    @if ($errors->any())
    <div>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif

    <!-- ログインフォーム -->
    <form class="flex flex-col gap-4 bg-white p-8 rounded-xl shadow-lg w-80" action="/login" method="POST">
      @csrf
      <div>
        <label class="mb-1 text-gray-700">メールアドレス：</label>
        <input class="w-full p-2 border-2 border-indigo-400 rounded-md" name="email" value="{{ old('email') }}" required>
      </div>
      <div>
        <label>パスワード：</label>
        <input type="password" class="w-full p-2 border-2 border-indigo-400 rounded-md" name="password" value="{{ old('password') }}" required>
      </div>
      <button type="submit" class="mt-4 bg-indigo-500 text-white py-2 rounded-md hover:bg-indigo-600 transition">ログイン</button>
    </form>
    <div>
      <a href="{{ url('/register') }}" class="block text-center mt-4 text-gray-600 hover:underline">新規登録</a>
    </div>
  </div>
</body>

</html>
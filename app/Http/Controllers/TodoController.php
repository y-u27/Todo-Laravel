<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // データ一覧
    public function index()
    {
        $todos = Todo::all();
        return view('todos', ['todos' => $todos]);
    }

    // データ保存
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|integer|min:0|max:2',
            'contents' => 'nullable|string',
        ]);

        Todo::create($validated);

        return redirect('/todos');
    }

    public function edit($id)
    {
        $todo = Todo::find($id);
        return view('edit', ['todo' => $todo]);
    }

    // データ更新
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'status' => 'required|integer|min:0|max:2',
            'contents' => 'nullable|string',
        ]);

        $todo = Todo::find($id);
        $todo->update($request->all());

        return redirect('/todos');
    }

    // データ削除
    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        return redirect('/todos');
    }
}

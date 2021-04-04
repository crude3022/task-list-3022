<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;  

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           // メッセージ一覧を取得
        $tasklists = Task::all();

        // メッセージ一覧ビューでそれを表示
        return view('tasks.index', [
            'tasklists' => $tasklists,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
          $tasklist = new Task;

        // メッセージ作成ビューを表示
        return view('tasks.create', [
            'tasklist' => $tasklist,
        ]);//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:10',
            'content' => 'required|max:255',
            'status' => 'required|max:30',
        ]);
          // メッセージを作成
        $tasklist = new Task;
        $tasklist->id = $request->id;
        $tasklist->name = $request->name;
        $tasklist->content = $request->content;
        $tasklist->status = $request->status;
        $tasklist->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
             // idの値でメッセージを検索して取得
        $tasklist = Task::findOrFail($id);

        // メッセージ詳細ビューでそれを表示
        return view('tasks.show', [
            'tasklist' => $tasklist,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasklist = Task::findOrFail($id);

        // メッセージ編集ビューでそれを表示
        return view('tasks.edit', [
            'tasklist' => $tasklist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:10',
            'content' => 'required|max:255',
            'status' => 'required|max:30',
        ]);
       // idの値でメッセージを検索して取得
        $tasklist = Task::findOrFail($id);
        // メッセージを更新
        $tasklist->id = $request->id;
        $tasklist->name = $request->name;
        $tasklist->content = $request->content;
        $tasklist->status = $request->status;
        $tasklist->save();

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // idの値でメッセージを検索して取得
        $tasklist = Task::findOrFail($id);
        // メッセージを削除
        $tasklist->delete();

        // トップページへリダイレクトさせる
        return redirect('/');
    }
}

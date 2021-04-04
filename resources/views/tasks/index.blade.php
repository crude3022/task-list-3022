@extends('layouts.app')

@section('content')

<h1>タスク一覧</h1>

    @if (count($tasklists) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>担当者名</th>
                    <th>内容</th>
                    <th>進行状況</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasklists as $tasklist)
                <tr>
                    {{-- メッセージ詳細ページへのリンク --}}
                    <td>{!! link_to_route('tasks.show',  $tasklist->id , ['task'=> $tasklist->id]) !!}</td>
                    <td>{{ $tasklist->name }}</td>
                    <td>{{ $tasklist->content }}</td>
                    <td>{{ $tasklist->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
    
     {{-- メッセージ作成ページへのリンク --}}
    {!! link_to_route('tasks.create', '新規タスクの投稿', [], ['class' => 'btn btn-primary']) !!}

@endsection
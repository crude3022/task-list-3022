@extends('layouts.app')

@section('content')

 <h1>タスク新規作成ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($tasklist, ['route' => 'tasks.store']) !!}

                 <div class="form-group">
                    {!! Form::label('name', '担当者名:') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('content', '内容:') !!}
                    {!! Form::text('content', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('status', '進行状況:') !!}
                    {!! Form::text('status', null, ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('投稿', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    </div>
<!-- ここにページ毎のコンテンツを書く -->

@endsection
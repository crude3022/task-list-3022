@extends('layouts.app')

@section('content')


<h1>id: {{ $tasklist->id }} のメッセージ編集ページ</h1>

    <div class="row">
        <div class="col-6">
            {!! Form::model($tasklist, ['route' => ['tasks.update', $tasklist->id], 'method' => 'put']) !!}
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

                {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div><!-- ここにページ毎のコンテンツを書く -->

@endsection
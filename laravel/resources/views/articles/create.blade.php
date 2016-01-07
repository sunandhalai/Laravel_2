@extends('articles.layout')

@section('page-title', 'New Article')


@section('content')

{!! Form::open(['url' => 'articles']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title: ') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Body: ') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('published_at', 'Publish on') !!}
        {!! Form::date('published_at', \Carbon\Carbon::now()->format('Y-m-d'), ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add Article', ['class'=>'form-control btn btn-primary']) !!}
    </div>

{!! Form::close() !!}
@endsection
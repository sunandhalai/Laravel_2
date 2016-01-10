@extends('articles.layout')

@section('page-title', 'edit Article')


@section('content')
    <h1 class="page-title">Edit: {{ $article->title }}</h1>

    @include('errors.list')

    {!! Form::model($article, ['method' => 'PATCH', 'action' => ['ArticleController@update', $article->id]]) !!}

        @include('articles._form', ['submitButtonText' => '<i class="glyphicon glyphicon-pencil"></i> Update Article'])

    {!! Form::close() !!}
@endsection
@stop
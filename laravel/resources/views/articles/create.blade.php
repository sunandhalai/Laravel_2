@extends('articles.layout')

@section('page-title', 'New Article')


@section('content')
    <h1 class="page-title">Write a New article</h1>

    @include('errors.list')

{!! Form::open(['url' => 'articles', 'files' => true]) !!}

    @include('articles._form', ['submitButtonText' => '<i class="glyphicon glyphicon-plus"></i> Add Article'])

{!! Form::close() !!}
@endsection
@stop
@extends('main')

@section('title')
    {{ $title }}
@endsection


@section('content')

    <h1> {{ $title }} </h1>

    <p> {{ $content }} </p>

@endsection
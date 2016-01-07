@extends('articles.layout')

@section('page-title', 'laravel')


@section('content')

    @foreach($articles as $value)

        <div class="panel panel-default">

            <div class="panel-heading">
                <a href="{{ url('articles/' . $value->id) }}">
                    {{ $value->title }}
                </a>
            </div>

            <div class="panel-body">
                {{ $value->body }}
            </div>

            <div class="panel-footer">
                {{ $value->published_at }}
            </div>

        </div>

    @endforeach

@endsection
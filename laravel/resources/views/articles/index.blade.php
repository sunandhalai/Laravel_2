@extends('articles.layout')

@section('page-title', 'laravel')


@section('content')

    {{-- show user --}}
    <div class="page-header">
        <h1>{{ trans('site.article') }}</h1>
        <p class="lead">
            All articles
            @if(Auth::check())
                for &nbsp; {{ Auth::user()->name }}
            @endif
        </p>
    </div>

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
                By <strong>{{ $value->user->name }}</strong>
                {{ $value->published_at->diffForHumans() }}
            </div>

        </div>

    @endforeach

@endsection
@stop
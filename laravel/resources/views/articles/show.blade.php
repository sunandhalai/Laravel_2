@extends('articles.layout')

@section('page-title', $articles->title)


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1> {{ $articles->title }} </h1>
        </div>
    </div>

    <div class="row">
        <p>
            <a href="{{ $articles->id }}">
                <button class="btn btn-primary">Edit</button>
            </a>
            &nbsp;
            <a href="{{ $articles->id }}">
                <button class="btn btn-warning">Delete</button>
            </a>
        </p>
    </div>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">
                {{ $articles->body }}
            </div>

            <div class="panel-footer">
                {{ $articles->published_at }}
            </div>
        </div>
    </div>
@endsection



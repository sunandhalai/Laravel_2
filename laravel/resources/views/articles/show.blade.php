@extends('articles.layout')

@section('page-title', $article->title)


@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1> {{ $article->title }} </h1>
        </div>
    </div>

    <div class="row">
        <a href="{{ url("articles/{$article->id}/edit") }}">
            <button class="btn btn-primary">{{ trans('site.add_article') }}</button>
        </a>

    </div>
    <br>

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-body">

                {{-- show image --}}
                @if($article->image)
                    <img src="{{ url($article->image) }}"
                         class="img-responsive"
                         style="max-width: 200px;">
                @else
                    <img src="{{ url("images/java-oracle.png") }}"
                         class="img-responsive"
                         style="max-width: 200px;">
                @endif

                {{ $article->body }}
            </div>

            <div class="panel-footer">
                {{ $article->published_at->diffForHumans() }}
                @unless($article->tags->isEmpty())
                    <div>Tags
                        <ul>
                            @foreach($article->tags as $tag)
                                <li class="label label-primary">{{ $tag->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endunless
            </div>
        </div>
    </div>

    <div class="row">
        {!! Form::open(['method' => 'DELETE', 'url' => 'articles/'.$article->id]) !!}
            {!! Form::submit( trans('site.edit_article'), ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
    </div>
@endsection
@stop



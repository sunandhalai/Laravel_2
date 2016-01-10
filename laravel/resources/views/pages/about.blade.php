@extends('articles.layout')

@section('title', 'About Me')

@section('content')
    <div class="page-header">
        <h1>About Me: {{ $first }}  {{ $last }}</h1>
    </div>

    <p>I am a programmer who love in PHP and going to be a laravel geek.</p>
    <h4>Favorite Quote</h4>
    <blockquote>
        <p>Life is like riding a bicycle. To keep your balance, you must keep moving.</p>
        <footer>Albert Einstein</footer>
    </blockquote>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">My Skills</h3>
        </div>

        <div class="panel-body">
            <ul class="list-group">
                @foreach($skills as $skill)
                    <li class="list-group-item">{{ $skill }}</li>
                @endforeach
            </ul>
        </div>
    </div> {{-- end panel --}}


    <div class="row">
        <div class="col-md-3 col-sm-4 col-xs-6 well well-lg">
            <i class="glyphicon glyphicon-film"></i>
            Harry Potter
        </div>

        <div class="col-md-3 col-sm-4 col-xs-6 well well-lg">
            <i class="glyphicon glyphicon-music"></i>
            Love Me Like You Do
        </div>

        <div class="col-md-3 col-sm-4 col-xs-6 well well-lg">
            <i class="glyphicon glyphicon-heart"></i>
            Laravel 5
        </div>

        <div class="col-md-3 col-sm-4 col-xs-6 well well-lg">
            <i class="glyphicon glyphicon-plane"></i>
            Paris, France
        </div>
    </div>




@endsection
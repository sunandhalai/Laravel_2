<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Articles : @yield('page-title')</title>

    {{-- link css --}}
    {!! HTML::style('/assets/bootstrap/css/bootstrap.min.css') !!}

    <style>
        body {
            min-height: 2000px;
            padding-top: 70px;
        }
        .container {
            width: 970px;
        }
    </style>

</head>
<body>

<!-- Fixed navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=url('articles') ?>">Article</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?=url('articles') ?>">Home</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?=url('articles/create')?>">New Article</a></li>
                <li>
                    <a href="{{ url('lang/en') }}"
                       class="btn btn-default">EN</a>
                </li>
                <li>
                    <a href="{{ url('lang/th') }}"
                       class="btn btn-default">TH</a>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    {{-- check error --}}
    @if(session()->has('flash_message'))
        {{-- alert box --}}
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ session()->get('flash_message') }}
        </div>
    @endif

    @yield('content')

</div> <!-- /container -->


<footer class="footer">
    <div class="container">
        <p class="text-muted">Laravel v5.0.22</p>
    </div>
</footer>

{{-- include script --}}
{!! HTML::script('/assets/jQuery/jquery-1.11.3.min.js') !!}
{!! HTML::script('/assets/bootstrap/js/bootstrap.min.js') !!}
</body>
</html>
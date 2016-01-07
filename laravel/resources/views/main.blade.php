<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel - @yield('title') </title>

    {{-- link css --}}
    {!! HTML::style('/assets/bootstrap/css/bootstrap.min.css') !!}

</head>
<body>
    <div class="container">
        @yield('content')
    </div>


    {{-- include script --}}
    {!! HTML::script('/assets/jQuery/jquery-1.11.3.min.js') !!}
    {!! HTML::script('/assets/bootstrap/js/bootstrap.min.js') !!}
</body>
</html>
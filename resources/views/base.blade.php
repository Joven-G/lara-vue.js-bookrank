<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookRank</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="app">
        <nav class="navbar bg-white border-bottom">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('home') }}">BookRank</a>
                </div>
                <div class="" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="navbar-item">
                            <a href="#" class="navbar-link">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="navbar-item">
                        <form action="/logout" method="POST">
                            {{ csrf_field() }}
                            <button class="btn btn-link navbar-link" type="submit">Logout</button>
                        </form>

                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
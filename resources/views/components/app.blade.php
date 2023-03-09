<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">

    <!-- Styles -->
    <style>
        .main-positioning a {
            text-decoration: none;
            font-weight: 700;
            color: rgb(81, 80, 79);

        }
    </style>

<body class="antialiased">
    <div class="top-0 ms-auto">
        <div class="position-relative1">
            @if (Route::has('login'))
                <div class="mt-3 main-positioning position-absolute top-0 end-0 p-3">
                    @auth
                        <a href="{{ url('/home') }}" class="font-text-bold text-uppercase">Home</a>

                        <form class="font-text-bold text-uppercase" action="/logout" method="post">
                            @csrf
                            <input name="submit" value="Logout" type="submit" class="font-text-bold text-uppercase">
                        </form>
                    @else
                        <div class="align-self-end">
                            <a href="{{ route('login') }}" class="font-text-bold mr-2">Log
                                in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="font-text-bold">Register</a>
                            @endif
                        </div>
                    @endauth
                </div>
            @endif
        </div>

        <div class="page-wrapper">
            {{ $slot }}
        </div>
    </div>
</body>

<script src="/bootstrap/js/bootstrap.min.js"></script>

</html>

<!DOCTYPE html>



<html lang="en">


<head>


    <meta charset="utf-8">


    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>Basic Website - @yield('title')</title>


    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>


</head>


<body>


    @include('layouts.menu')


    <div class="container">


        @yield('content')


    </div>


</body>


</html>
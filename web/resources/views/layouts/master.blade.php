<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title') - WebSecService</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}" defer></script>
</head>
<body>

    <!-- Common Menu -->
    @include('layouts.master')

    <!-- Page Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>BookSaw - @yield('title', 'Online Bookstore')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor.css') }}">
    <link rel="stylesheet" href="{{ asset('icomoon/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body data-bs-spy="scroll" data-bs-target="#header" tabindex="0">

    @include('partials.navbar')

    @if(session('success'))
    <div class="container mt-3">
        <div class="alert alert-success text-center custom-success-alert">
            {{ session('success') }}
        </div>
    </div>
@endif
    @yield('content')

    @include('partials.footer')

    <script src="{{ asset('js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>

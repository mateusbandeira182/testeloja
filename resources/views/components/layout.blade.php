<!doctype html>
<html lang="pt-BR" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Loja Virtual') }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <script src="https://kit.fontawesome.com/c63f14c763.js" crossorigin="anonymous"></script>
</head>
<body class="h-100 bg-light">
@include('components.header')
<main>
    <div class="container">
        @isset($alert)
            <div class="alert alert-{{ $type }} mt-3">
                {{ $alert }}
            </div>
        @endisset
        {{ $slot }}
    </div>
</main>
@include('components.footer')
<script src="{{ asset('assets/js/app.js') }}"></script>
@stack('plugins-scripts')
@stack('custom-scripts')
</body>
</html>

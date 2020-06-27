<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/theme.js') }}" defer></script>
    <script src="{{ asset('js/dropdown.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:wght@100&Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png') }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/about.css') }}" rel="stylesheet">
    <link href="{{ asset('css/items.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/content.css') }}" rel="stylesheet">

</head>
<body>
    @if (Auth::guard('admin')->check())
        @include('includes.admin-navbar')
    @else
        @include('includes.navbar')
    @endif

    <div class="container content-container">
        @include('includes.messages')
        @yield('content')
    </div>

    <!-- CkEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create(document.querySelector('#article-ckeditor'))
        .catch(error=>{
            console.log(error);
        });
    </script>

</body>
</html>

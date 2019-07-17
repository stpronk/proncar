<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
    <div id="app">
        <!-- include navbar -->
        @include('layouts.navbar', ['items' => $nav])

        <!-- include main -->
        @include('layouts.main')

        <!-- include footer -->
        @include('layouts.footer')
    </div>
</body>
</html>

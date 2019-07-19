<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
    <div id="app">
        <navigation-component :items="{{ json_encode($nav) }}" :editable="'{{ $editable ?? false }}'" :auth="'{{ Auth::check() }}'"></navigation-component>

        <!-- include main -->
        @yield('content')

        <footer-component></footer-component>
    </div>
</body>
</html>

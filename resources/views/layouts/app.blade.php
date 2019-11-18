<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
</head>
<body>
    <div id="app">
        <navigation-component
                :page="{{ $index ?? 'admin' }}"
                :items="{{ json_encode($nav) }}"
                :auth="{{ is_null(Auth::user()) ? 0 : 1 }}"
        ></navigation-component>

        <!-- include main -->
        @yield('content')

        <footer-component></footer-component>
    </div>
</body>
</html>

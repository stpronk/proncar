@extends('layouts.app')

@section('content')

    <default-component :items="{{ json_encode($sections) }}"></default-component>

{{--    <main>--}}
{{--    @foreach($sections as $key => $section)--}}

{{--        <header-component :content="{{ json_encode($section['content']) }}"></header-component>--}}

{{--        @include('sections.'.$section['blade'], ['content' => $section['content']])--}}

{{--    @endforeach--}}
{{--    </main>--}}

@endsection
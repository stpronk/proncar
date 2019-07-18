@extends('layouts.app')

@section('content')

    @foreach($sections as $key => $section)

        {{--        <header-component :content="{{ json_encode($section['content']) }}"></header-component>--}}

        @include('sections.'.$section['blade'], ['content' => $section['content']])

    @endforeach

@endsection
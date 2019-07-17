@extends('layouts.app')

@section('content')

    @foreach($sections as $key => $section)

        @include('sections.'.$section['blade'], ['content' => $section['content']])

    @endforeach

@endsection
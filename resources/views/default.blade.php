@extends('layouts.app')

@section('content')
    <default-component :items="{{ json_encode($sections) }}" :auth="'{{ Auth::check() }}'"></default-component>
@endsection
@extends('layouts.app')

@section('content')
    <default-component :page="{{ $index }}" :items="{{ json_encode($sections) }}" :auth="'{{ Auth::check() }}'"></default-component>
@endsection
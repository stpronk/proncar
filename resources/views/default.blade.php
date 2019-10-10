@extends('layouts.app')

@section('content')
    <default-component :items="{{ json_encode($sections) }}"></default-component>
@endsection
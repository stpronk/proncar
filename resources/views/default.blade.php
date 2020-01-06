@extends('layouts.app')

@section('content')
    <default-component page="{{ $index }}" :items="{{ json_encode($sections) }}" :auth="{{ is_null(Auth::user()) ? 0 : 1 }}"></default-component>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <form action="POST" method="{{ route($page['index'].'.store')  }}">

            @csrf
            @method('POST')

            @foreach($page['sections'] as $section)
                <div class="row">
                    @include('sections.editor.'.$section['blade'], ['section' => $section])
                </div>
            @endforeach
        </form>
    </div>
@stop
@extends('layouts.main')

@section('title', 'About Me')

@section('content')
    <h1 class="mt-5">About Me: {{ $first }} {{ $last }}</h1>
    <p>Lorem ipsum dolor sit amet.</p>

    <a href=""></a>

    <ul>
        @foreach ($skills as $skill)
            <li>{{ $skill }}</li>
        @endforeach
    </ul>

    <img src="{{ asset('/images/user.jpg') }}" width="250" height="250" alt="">

    {{ html()->form('PUT', '/post')->open() }}

    {{ html()->email('email')->placeholder('Your e-mail address') }}

    {{ html()->form()->close() }}
@endsection

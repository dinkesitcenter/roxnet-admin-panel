@extends('pak::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('pak.name') !!}</p>
@endsection

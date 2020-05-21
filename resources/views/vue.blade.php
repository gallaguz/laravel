@extends('layouts.main')

@section('title', 'Главная')


@section('menu')
    @include('menu')
@endsection

@section('content')
<div id="app">
    <example-component></example-component>
</div>
@endsection

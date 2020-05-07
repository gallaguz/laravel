@extends('layouts.main')

@section('title')
    @parent | Админка
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <p>Админка!</p>
@endsection

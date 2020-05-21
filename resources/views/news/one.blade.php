@extends('layouts.main')

@section('title')
    @parent | Одна новость
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    @if (!$news['isPrivate'])
        <h2><?=$news['title']?></h2>
        <p><?=$news['text']?></p>
    @else
        This is a private news. PLS register
        {{--    This is a private news. PLS register {{ route('register') }}--}}
    @endif
@endsection

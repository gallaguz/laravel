
@extends('layouts.main')

@section('title')
    @parent | Новости
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    @forelse ($news as $item)
        <h3>{{ $item['title'] }}</h3>
        @if (!$item['isPrivate'])
            <a href="{{ route('NewsOne', $item['id']) }}">Details...</a><br>
        @else
            Приватная новость
        @endif
        <hr>
    @empty
        Нет новостей
    @endforelse
@endsection

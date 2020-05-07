@extends('layouts.main')

@section('title')
    @parent | Категории
@endsection

@section('content')
    @forelse($categories as $category)
        <a href="{{ route('news.category.show', $category['name']) }}">
            <h2>{{ $category['category'] }}</h2>
        </a>

    @empty
        Нет категорий
    @endforelse
@endsection


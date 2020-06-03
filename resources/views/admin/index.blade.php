@extends('layouts.main')

@section('title', 'Админка')

@section ('menu')
    @include('admin.menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <h2>Админка</h2>
            @forelse($news as $item)
                <div class="col-md-12 card">
                    <div class="card-body">

                        <h2>
                            <a href="{{ route('news.show', $item) }}">{{ $item->title }}</a>
                        </h2>

                        <form action="{{ route('admin.news.destroy', $item) }}" method="post">
                            <a href="{{ route('admin.news.edit', $item) }}"><button type="button" class="btn btn-success">Edit</button></a>
                            <button type="submit" class="btn btn-danger">Delete</button>
                            @csrf
                            @method('DELETE')
                        </form>

                    </div>
                </div>
            @empty
                Нет новостей
            @endforelse
            {{ $news->links() }}
        </div>
    </div>
@endsection

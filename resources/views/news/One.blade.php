@extends('layouts.main')

@section('title', 'Новость')

@section ('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if (!$news->isPrivate || Auth::check())
                            <h2>{{ $news->title }}</h2>
                            <div class="card-img"
                                 style="background-image: url({{ $news->image ?? asset('storage/default.jpg') }})">
                            </div>
                            <p>{!! $news->text !!}</p>
                        @else
                            Новость приватная, зарегистрируйтесь для просмотра.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.main')

@section('title', 'Тест1')


@section ('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <form
                            enctype="multipart/form-data"
                            method="POST"
                            action="@if (!$news->id) {{ route('admin.create') }}
                                    @else {{ route('admin.update', $news) }}
                                    @endif">

                            @csrf

                            {{-- START title --}}
                            <div class="form-group">
                                <label for="newsTitle">Название новости</label>
                                <input
                                    name="title"
                                    type="text"
                                    class="form-control"
                                    id="newsTitle"
                                    value="{{ $news->title ?? old('title') }}">
                            </div>
                            {{-- END title --}}

                            {{-- START category --}}
                            <div class="form-group">
                                <label for="newsCategory">
                                    Категория новости
                                </label>
                                <select
                                    name="category"
                                    class="form-control"
                                    id="newsCategory">

                                    @forelse($categories as $item)
                                        <option @if ($item['id'] == old('category')) selected @endif value="{{ $item['id'] }}">{{ $item['category'] }}</option>
                                    @empty
                                        <h2>Нет категории</h2>
                                    @endforelse
                                </select>
                            </div>
                            {{-- END category --}}

                            {{-- IMAGE text news --}}
                            <div class="form-group">
                                <label for="newsText">Текст новости</label>
                                <textarea
                                    name="text"
                                    class="form-control"
                                    rows="5"
                                    id="newsText">
                                        {{ $news->text ?? old('text') }}
                                </textarea>
                            </div>
                            {{-- END text news --}}

                            {{-- START image insert --}}
                            <div class="form-group">
                                <input type="file" name="image">
                            </div>
                            {{-- END image insert --}}

                            {{-- START isPrivate --}}
                            <div class="form-check">
                                <input @if ($news->isPrivate ==1 || old('isPrivate') == 1) checked @endif
                                       name="isPrivate"
                                       class="form-check-input"
                                       type="checkbox"
                                       value="1"
                                       id="newsPrivate">
                                <label
                                    class="form-check-label"
                                    for="newsPrivate">
                                        Новость private?
                                </label>
                            </div>
                            {{-- END isPrivate --}}

                            {{-- START submit --}}
                            <div class="form-group">
                                <button type="submit" class="form-control">
                                    @if ($news->id) Изменить @else Добавить @endif
                                </button>
                            </div>
                            {{-- END submit --}}

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

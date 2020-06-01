@extends('layouts.main')

@section('title', 'Добавить новость')


@section ('menu')
    @include('admin.menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">

                        <form enctype="multipart/form-data" method="POST"
                              action="@if (!$news->id){{ route('admin.create') }}@else{{ route('admin.update', $news) }}@endif">
                            @csrf

                            <div class="form-group">
                                <label for="newsTitle">Название новости</label>
                                @if ($errors->has('title'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('title') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input name="title" type="text" class="form-control" id="newsTitle"
                                       value="{{ $news->title ?? old('title') }}">
                            </div>


                            <div class="form-group">
                                <label for="newsCategory">Категория новости</label>
                                @if ($errors->has('category_id'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('category_id') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <select name="category_id" class="form-control" id="newsCategory">
                                    @forelse($categories as $item)
                                        <option @if ($item['id'] == old('category_id')) selected
                                                @endif value="{{ $item['id'] }}">{{ $item['category'] }}</option>
                                    @empty
                                        <h2>Нет категории</h2>
                                    @endforelse

                                </select>

                            </div>

                            <div class="form-group">
                                <label for="newsText">Текст новости</label>
                                @if ($errors->has('text'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('text') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <textarea name="text" class="form-control" rows="5"
                                          id="newsText">{{ $news->text ?? old('text') }}</textarea>
                            </div>

                            <div class="form-group">
                                @if ($errors->has('image'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('image') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="file" name="image">
                            </div>

                            <div class="form-check">
                                <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked
                                       @endif name="isPrivate" class="form-check-input" type="checkbox" value="1"
                                       id="newsPrivate">
                                <label class="form-check-label" for="newsPrivate">
                                    Новость private?
                                </label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="form-control">
                                    @if ($news->id){{__('Изменить')}}@else{{__('Добавить')}}@endif
                                </button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

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
                              action="@if (!$news->id){{ route('admin.news.store') }}@else{{ route('admin.news.update', $news) }}@endif">
                            @csrf
                            @if ($news->id) @method('PATCH') @endif

                            {{-- title --}}
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
                                       value="{{ old('title') ?? $news->title }}">
                            </div>
                            {{-- end title --}}
                            {{-- category --}}
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
                                        <option @if ($item->id == old('category_id') || $item->id == $news->category_id) selected
                                                @endif value="{{ $item->id }}">{{ $item->category }}</option>
                                    @empty
                                        <h2>Нет категории</h2>
                                    @endforelse
                                </select>
                            </div>
                            {{-- end category --}}
                            {{-- text --}}
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
                                          id="textEdit">{!! old('text') ?? $news->text !!}</textarea>
                            </div>
                            {{-- end text --}}
                            {{-- image --}}
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
                            {{-- end image --}}
                            {{-- isPrivate --}}
                            <div class="form-check">
                                <input @if (old('isPrivate') == 1 || $news->isPrivate == 1 ) checked
                                       @endif name="isPrivate" class="form-check-input" type="checkbox" value="1"
                                       id="newsPrivate">
                                <label class="form-check-label" for="newsPrivate">
                                    Новость private?
                                </label>
                            </div>
                            {{-- end isPrivate --}}
                            {{-- submit --}}
                            <div class="form-group">
                                <button type="submit" class="form-control">
                                    @if ($news->id){{__('Изменить')}}@else{{__('Добавить')}}@endif
                                </button>

                            </div>
                            {{-- end submit --}}
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <ckeditor value="Hello, World!"></ckeditor>--}}

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('textEdit', options);
    </script>

@endsection

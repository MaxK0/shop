@extends('layouts.admin')

@section('content')
    {{-- Content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Изменить товар</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Главная</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- End of content header --}}

    {{-- Main content --}}
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card card-primary col-md-12">
                    <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="from-group">
                                <label class="required" for="title">Название</label>
                                <input class="form-control @error('title') is-invalid @enderror" name="title"
                                    type="text" placeholder="Футболка черная" value="{{ old('title') ?? $product->title }}">
                                    @error('title')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="from-group">
                                    <label for="description">Описание</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" cols="30"
                                    rows="5" placeholder="Описание товара">{{ old('description') ?? $product->description }}</textarea>
                                @error('description')
                                <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label class="required" for="content">Контент</label>
                                <textarea class="form-control @error('content') is-invalid @enderror" name="content" cols="30" rows="5"
                                placeholder="Описание товара">{{ old('content') ?? $product->content }}</textarea>
                                @error('content')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                    @enderror
                            </div>

                            <div class="from-group">
                                <label class="required" for="price">Цена</label>
                                <input class="form-control @error('price') is-invalid @enderror" name="price"
                                type="text" placeholder="2000" value="{{ old('price') ?? $product->price }}">
                                @error('price')
                                <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            
                            <div class="from-group">
                                <label class="required" for="count">Количество</label>
                                <input class="form-control @error('count') is-invalid @enderror" name="count"
                                    type="text" placeholder="10" value="{{ old('count') ?? $product->count }}">
                                @error('count')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- TODO: сделать вывод старых значений --}}
                            <div class="form-group">
                                <label>Категория</label>
                                <select name="category_id" class="form-control select2" style="width: 100%;">
                                    <option selected="selected" disabled>Выберите категорию</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->title === $product->category->title ? 'selected' : '' }}
                                            >{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Теги</label>
                                <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Выберите теги"
                                    style="width: 100%;">
                                    @foreach ($tags as $tag)
                                        <option value="{{ $tag->id }}"
                                            {{ in_array($tag->id, $selectedTagsIds) ? 'selected' : '' }}
                                            >{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Цвета</label>
                                <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Выберите цвета"
                                    style="width: 100%;">
                                    @foreach ($colors as $color)
                                        <option value="{{ $color->id }}"
                                            {{ in_array($color->id, $selectedColorsIds) ? 'selected' : '' }}
                                            >{{ $color->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Изображение</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input name="preview_image" type="file" class="custom-file-input">
                                        <label class="custom-file-label" for="exampleInputFile">Выберите файл (оставьте пустым, если не хотите менять)</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Опубликовать</label>
                                <select name="is_published" class="form-control select2" style="width: 100%;">
                                    <option selected="selected" disabled>Выберите вариант</option>
                                    <option value="1" {{ $product->is_published == '1' ? 'selected' : '' }}>Да</option>
                                    <option value="0" {{ $product->is_published == '0' ? 'selected' : '' }}>Нет</option>
                                </select>
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Изменить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- End of main content --}}
@endsection

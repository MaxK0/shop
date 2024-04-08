@extends('layouts.admin')

@section('content')
    {{-- Content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Товар</h1>
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

                {{-- Card header --}}
                <div class="card-header d-flex p-3" style="width: 100%">
                    <div>
                        <a href="{{ route('admin.products.edit', $product) }}"
                            class="btn btn-primary mr-3">Редактировать</a>
                    </div>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </div>
                {{-- End of card header --}}

                {{-- Card table --}}
                <div class="card-body p-0">
                    <table class="table table-sm">                        
                        <tbody>                            
                            <tr>
                                <th>Id</th>
                                <td>{{ $product->id }}</td>
                            </tr>
                            <tr>
                                <th>Название</th>
                                <td>{{ $product->title }}</td>
                            </tr>
                            <tr>
                                <th>Описание</th>
                                <td>
                                    @foreach ($product->description as $row)
                                        {{ $row }} <br/>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Контент</th>
                                <td>
                                    @foreach ($product->content as $row)
                                        {{ $row }} <br/>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Цена</th>
                                <td>{{ $product->price }}</td>
                            </tr>
                            <tr>
                                <th>Количество</th>
                                <td>{{ $product->count }}</td>
                            </tr>
                            <tr>
                                <th>Категория</th>
                                <td>{{ $product->category ? $product->category->title : '' }}</td>
                            </tr>
                            <tr>
                                <th>Теги</th>
                                <td>
                                    @foreach ($product->tags as $tag)
                                        {{ $tag->title }} <br>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Цвета</th>
                                <td>
                                    @foreach ($product->colors as $color)
                                        {{ $color->title }} <br>
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <th>Изображение</th>
                                <td>
                                    <img style="width: 30%" src="{{ asset('storage') . '/' . $product->preview_image }}" alt="Изображение не найдено">
                                </td>
                            </tr>
                            <tr>
                                <th>Опубликовано</th>
                                <td>{{ $product->is_published ? 'Да' : 'Нет' }}</td>
                            </tr>                            
                        </tbody>
                    </table>
                </div>
                {{-- End of card table --}}

            </div>
        </div>
    </section>
    {{-- End of main content --}}
@endsection

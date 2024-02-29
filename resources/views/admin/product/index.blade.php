@extends('layouts.admin')

@section('content')
    {{-- Content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Товары</h1>
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
                <div class="card-header" style="width: 100%">
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Добавить</a>
                </div>
                {{-- End of card header --}}

                {{-- Card table --}}
                <div class="card-body p-0">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Название</th>
                                <th>Описание</th>
                                <th>Цена</th>
                                <th>Количество</th>
                                <th>Опуликовано</th>
                                <th>Категория</th>
                                <th>Теги</th>
                                <th>Цвета</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td><a href="{{ route('admin.products.show', $product->id) }}">{{ $product->title }}</a></td>
                                    <td>{{ Str::limit($product->description, 50, '...') }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->count }}</td>
                                    <td>{{ $product->is_published ? 'Да' : 'Нет' }}</td>
                                    <td>{{ $product->category->title }}</td>
                                    <td>
                                        @foreach ($product->tags as $tag)
                                            {{ $tag->title }} <br/>
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach ($product->colors as $color)
                                            {{ $color->title }} <br/>
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- End of card table --}}

            </div>
        </div>
    </section>
    {{-- End of main content --}}
@endsection

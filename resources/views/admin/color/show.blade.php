@extends('layouts.admin')

@section('content')
    {{-- Content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Категория</h1>
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
                        <a href="{{ route('admin.colors.edit', $color) }}" class="btn btn-primary mr-3">Редактировать</a>
                    </div>
                    <form action="{{ route('admin.colors.destroy', $color) }}" method="POST">
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
                                <th style="width: 20%">Id</th>
                                <td>{{ $color->id }}</td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Заголовок</th>
                                <td>{{ $color->title }}</td>
                            </tr>
                            <tr>
                                <th style="width: 20%">Цвет</th>
                                <td><div style="width: 16px; height: 16px; background: {{ '#' . $color->title }}"></div></td>
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

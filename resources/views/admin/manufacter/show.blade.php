@extends('layouts.admin')

@section('content')
    {{-- Content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Производитель</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="/admin">Главная</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    {{-- End of content header --}}

    {{-- Main content --}}
    <x-section-content>
        <div class="row">

            {{-- Card header --}}
            <div class="card-header d-flex p-3" style="width: 100%">
                <div>
                    <a href="{{ route('admin.manufacters.edit', $manufacter) }}"
                        class="btn btn-primary mr-3">Редактировать</a>
                </div>
                <form action="{{ route('admin.manufacters.destroy', $manufacter) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
            {{-- End of card header --}}

            {{-- Card table --}}
            <div class="card-body p-0">
                <table class="table table-sm show">
                    <tbody>
                        <tr>
                            <th>Id</th>
                            <td>{{ $manufacter->id }}</td>
                        </tr>
                        <tr>
                            <th>Производитель</th>
                            <td>{{ $manufacter->title }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            {{-- End of card table --}}

        </div>
    </x-section-content>
    {{-- End of main content --}}
@endsection

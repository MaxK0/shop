@extends('layouts.admin')

@section('content')
    {{-- Content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Размеры</h1>
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
            <div class="card-header" style="width: 100%">
                <a href="{{ route('admin.sizes.create') }}" class="btn btn-primary">Добавить</a>
            </div>
            {{-- End of card header --}}

            {{-- Card table --}}
            <div class="card-body p-0">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Размер</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sizes as $size)
                            <tr>
                                <td>{{ $size->id }}</td>
                                <td><a href="{{ route('admin.sizes.show', $size->id) }}">{{ $size->title }}</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- End of card table --}}

        </div>
        {{ $sizes->links() }}
    </x-section-content>
    {{-- End of main content --}}
@endsection
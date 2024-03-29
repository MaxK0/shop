@extends('layouts.admin')

@section('content')
    {{-- Content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователи</h1>
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
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Добавить</a>
                </div>
                {{-- End of card header --}}

                {{-- Card table --}}
                <div class="card-body p-0">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Имя</th>
                                <th>Фамилия</th>
                                <th>Отчество</th>
                                <th>Email</th>
                                <th>Возраст</th>
                                <th>Пол</th>
                                <th>Адрес</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td><a href="{{ route('admin.users.show', $user->id) }}">{{ $user->name }}</a></td>
                                    <td>{{ $user->surname }}</td>
                                    <td>{{ $user->lastname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->age }}</td>
                                    <td>{{ $user->genderTitle }}</td>

                                    <td>{{ $user->address }}</td>
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

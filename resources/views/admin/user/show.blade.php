@extends('layouts.admin')

@section('content')
    {{-- Content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Пользователь</h1>
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
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary mr-3">Редактировать</a>
                    </div>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
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
                                <th style="width: 20%;">Id</th>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Имя</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Фамилия</th>
                                <td>{{ $user->surname }}</td>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Отчество</th>
                                <td>{{ $user->lastname }}</td>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Email</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Возраст</th>
                                <td>{{ $user->age }}</td>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Пол</th>
                                <td>
                                    @if ($user->gender == 1)
                                        Мужской
                                    @elseif($user->gender == 2)
                                        Женский
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th style="width: 20%;">Адрес</th>
                                <td>{{ $user->address }}</td>
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

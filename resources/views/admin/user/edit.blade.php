@extends('layouts.admin')

@section('content')
    {{-- Content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Изменить пользователя</h1>
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
            <x-card-primary>
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <x-form-group name="name" label="Имя" placeholder="Иван" :table="$user"
                            required></x-form-group>

                        <x-form-group name="lastname" label="Фамилия" placeholder="Иванов" :table="$user"
                            required></x-form-group>

                        <x-form-group name="patronymic" label="Отчество" placeholder="Иванович"
                            :table="$user"></x-form-group>

                        <x-form-group name="email" type="email" label="Email" placeholder="ivan@gmail.com"
                            :table="$user" required></x-form-group>

                        <x-form-group name="phone" label="Телефон" placeholder="79992227777"
                            :table="$user"></x-form-group>

                        <x-form-group name="age" label="Возраст" placeholder="20" :table="$user"></x-form-group>

                        <x-form-group name="address" label="Адрес" placeholder="Москва - Ивановка 21, кв. 37"
                            :table="$user"></x-form-group>

                        <div class="form-group">
                            <label for="gender">Пол</label>
                            <select name="gender" class="form-control select2" data-placeholder="Выберите пол">
                                <option value="1" {{ (old('gender') ?? $user->gender) == 1 ? 'selected' : '' }}>
                                    Мужской</option>
                                <option value="2" {{ (old('gender') ?? $user->gender) == 2 ? 'selected' : '' }}>
                                    Женский</option>
                            </select>
                            <x-error name="gender"></x-error>
                        </div>

                        <x-form-group name="role_id" type="select" label="Роль" placeholder="Выберите роль"
                            :values=$roles :selectEdit="$user->role->id"></x-form-group>
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Изменить</button>
                    </div>
                </form>
            </x-card-primary>
        </div>
    </x-section-content>
    {{-- End of main content --}}
@endsection

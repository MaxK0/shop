@extends('layouts.admin')

@section('content')
    {{-- Content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить пользователя</h1>
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
    <x-section-content>
        <div class="row">
            <x-card-primary>
                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <x-form-group name="name" label="Имя" placeholder="Иван" required></x-form-group>

                        <x-form-group name="lastname" label="Фамилия" placeholder="Иванов" required></x-form-group>

                        <x-form-group name="patronymic" label="Отчество" placeholder="Иванович"></x-form-group>

                        <x-form-group name="email" type="email" label="Email" placeholder="ivan@gmail.com" required></x-form-group>

                        <x-form-group name="phone" label="Телефон" placeholder="79992227777"></x-form-group>

                        <x-form-group name="age" label="Возраст" placeholder="20"></x-form-group>

                        <x-form-group name="address" label="Адрес" placeholder="Москва - Ивановка 21, кв. 37"></x-form-group>  

                        <div class="form-group">
                            <label for="gender">Пол</label>
                            <select name="gender" class="form-control select2" data-placeholder="Выберите пол">
                                <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Мужской</option>
                                <option value="2" {{ old('gender') == 2 ? 'selected' : '' }}>Женский</option>
                            </select>
                            <x-error name="gender"></x-error>
                        </div>

                        <x-form-group name="password" type="password" label="Пароль" placeholder="********" required></x-form-group>
                        
                        <x-form-group name="password_confirmation" type="password" label="Подтверждение пароля" placeholder="********" required></x-form-group>

                        <x-form-group name="role_id" type="select" label="Роль" placeholder="Выберите роль" :values=$roles
                            ></x-form-group>                        
                    </div>

                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Добавить</button>
                    </div>
                </form>
            </x-card-primary>
        </div>
    </x-section-content>
    {{-- End of main content --}}
@endsection

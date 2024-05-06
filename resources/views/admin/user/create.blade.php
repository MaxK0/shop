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
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card card-primary col-md-12">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="from-group">
                                <label class="required" for="name">Имя</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name"
                                    type="text" placeholder="Иван" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label for="lastname">Фамилия</label>
                                <input class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                    type="text" placeholder="Иванов" value="{{ old('lastname') }}">
                                @error('lastname')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label for="patronymic">Отчество</label>
                                <input class="form-control @error('patronymic') is-invalid @enderror" name="patronymic"
                                    type="text" placeholder="Иванович" value="{{ old('patronymic') }}">
                                @error('patronymic')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label class="required" for="email">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" name="email"
                                    type="email" placeholder="ivan@gmail.com" value="{{ old('email') }}">
                                @error('email')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label for="phone">Телефон</label>
                                <input class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    type="text" placeholder="79992227777" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label for="age">Возраст</label>
                                <input class="form-control @error('age') is-invalid @enderror" name="age"
                                    type="text" placeholder="20" value="{{ old('age') }}">
                                @error('age')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label for="address">Адрес</label>
                                <input class="form-control @error('address') is-invalid @enderror" name="address"
                                    type="text" placeholder="Москва - Ивановка 21" value="{{ old('address') }}">
                                @error('address')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label for="gender">Пол</label>
                                <select name="gender" class="custom-select form-select">
                                    <option disabled selected>Пол</option>
                                    <option value="1" {{ old('gender') == 1 ? 'selected' : '' }}>Мужской</option>
                                    <option value="2" {{ old('gender') == 2 ? 'selected' : '' }}>Женский</option>
                                </select>
                                @error('gender')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label class="required" for="password">Пароль</label>
                                <input class="form-control @error('password') is-invalid @enderror" name="password"
                                    type="password" placeholder="******" value="{{ old('password') }}">
                                @error('password')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label class="required" for="password_confirmation">Подтверждение пароля</label>
                                <input class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                    type="password" placeholder="******" value="{{ old('password_confirmation') }}">
                                @error('password_confirmation')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role_id">Роль</label>
                                <select name="role_id" class="form-control select2" style="width: 100%;">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ old('role_id') == $role->id ? 'selected' : '' }}>{{ $role->title }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Добавить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- End of main content --}}
@endsection

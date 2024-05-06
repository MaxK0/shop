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
                    <form action="{{ route('admin.users.update', $user) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="from-group">
                                <label class="required" for="name">Имя</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name"
                                    type="text" placeholder="Иван" value="{{ old('name') ?? $user->name }}">
                                @error('name')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label for="lastname">Фамилия</label>
                                <input class="form-control @error('lastname') is-invalid @enderror" name="lastname"
                                    type="text" placeholder="Иванов" value="{{ old('lastname') ?? $user->lastname }}">
                                @error('lastname')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label for="patronymic">Отчество</label>
                                <input class="form-control @error('patronymic') is-invalid @enderror" name="patronymic"
                                    type="text" placeholder="Иванович" value="{{ old('patronymic') ?? $user->patronymic }}">
                                @error('patronymic')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label class="required" for="email">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror" name="email"
                                    type="email" placeholder="ivan@gmail.com" value="{{ old('email') ?? $user->email }}">
                                @error('email')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label for="phone">Телефон</label>
                                <input class="form-control @error('phone') is-invalid @enderror" name="phone"
                                    type="text" placeholder="7999222777" value="{{ old('phone') ?? $user->phone }}">
                                @error('phone')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label for="age">Возраст</label>
                                <input class="form-control @error('age') is-invalid @enderror" name="age" type="text"
                                    placeholder="20" value="{{ old('age') ?? $user->age }}">
                                @error('age')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label for="address">Адрес</label>
                                <input class="form-control @error('address') is-invalid @enderror" name="address"
                                    type="text" placeholder="Москва - Ивановка 21"
                                    value="{{ old('address') ?? $user->address }}">
                                @error('address')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="from-group">
                                <label for="gender">Пол</label>
                                <select name="gender" class="custom-select form-select">
                                    <option disabled selected>Пол</option>
                                    <option value="1" {{ (old('gender') ?? $user->gender) == 1 ? 'selected' : '' }}>
                                        Мужской</option>
                                    <option value="2" {{ (old('gender') ?? $user->gender) == 2 ? 'selected' : '' }}>
                                        Женский</option>
                                </select>
                                @error('gender')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="role_id">Роль</label>
                                <select name="role_id" class="form-control select2" style="width: 100%;">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}" {{ (old('role_id') ?? $user->role->title) == $role->id ? 'selected' : '' }}>{{ $role->title }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Изменить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- End of main content --}}
@endsection

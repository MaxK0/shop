@extends('layouts.admin')

@section('content')
    {{-- Content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить роль</h1>
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
                    <form action="{{ route('admin.roles.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="from-group">
                                <label for="id">Id</label>
                                <input class="form-control @error('id') is-invalid @enderror" name="id"
                                type="text" placeholder="1" value="{{ old('id') }}">
                                @error('id')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror

                                <label class="required" for="name">Название</label>
                                <input class="form-control @error('name') is-invalid @enderror" name="name"
                                    type="text" placeholder="Админ" value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- End of main content --}}
@endsection

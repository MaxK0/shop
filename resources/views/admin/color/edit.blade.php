@extends('layouts.admin')

@section('content')
    {{-- Content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Изменить цвет</h1>
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
                    <form action="{{ route('admin.colors.update', $color) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="card-body">
                            <div class="from-group">
                                <label class="required" for="title">Заголовок</label>
                                <input class="form-control @error('title') is-invalid @enderror" name="title"
                                    type="text" placeholder="F2271C" value="{{ old('title') ?? $color->title }}">
                                @error('title')
                                    <span class="invalid error-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Редактировать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    {{-- End of main content --}}
@endsection

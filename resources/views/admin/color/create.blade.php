@extends('layouts.admin')

@section('content')
    {{-- Content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить цвет</h1>
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
                  <form action="{{ route('admin.colors.store') }}" method="POST">
                      @csrf
                      <div class="card-body">
                        <div class="from-group">
                          <label class="required" for="title">Заголовок</label>
                          <input class="form-control @error('title') is-invalid @enderror" name="title" type="text" placeholder="fff" value="{{ old('title') }}">
                          @error('title')
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

@extends('layouts.admin')

@section('content')
    {{-- Content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Изменить производителя</h1>
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
            <div class="card card-primary col-md-12">
                <form action="{{ route('admin.manufacters.update', $manufacter) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <x-form-group name="id" label="Id" placeholder="1" :table="$manufacter"></x-form-group>
                        <x-form-group name="title" label="Производитель" placeholder="Комания X" :table="$manufacter"
                            required></x-form-group>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit">Изменить</button>
                    </div>
                </form>
            </div>
        </div>
    </x-section-content>
    {{-- End of main content --}}
@endsection

@extends('layouts.admin')

@section('content')
    {{-- Content header --}}
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Добавить производителя</h1>
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
                <div class="card card-primary col-md-12">
                    <form action="{{ route('admin.manufacters.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <x-form-group name="id" label="Id" placeholder="1"></x-form-group>
                            <x-form-group name="title" label="Производитель" placeholder="Компания X" required></x-form-group>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary" type="submit">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
    </x-section-content>
    {{-- End of main content --}}
@endsection

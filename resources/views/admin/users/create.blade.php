@extends('layouts.app')

@section('title')
    Создать
@endsection

@section('css-links')

@endsection

@section('main')
    <x-page-header title="Создать пользователь" :breadcrumbs="[
        ['name' => 'Дашбоард', 'url' => route('dashboard.index')],
        ['name' => 'Пользователи', 'url' => route('user.index')],
        ['name' => 'Создать пользовател', 'url' => route('user.create')],
    ]"/>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <x-form method="POST" action="{{ route('user.store') }}" :multipart="false">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <x-input label="Имя пользователя" id="name" type="text" name="name"
                                     placeholder="Имя пользователя" icon="fas fa-envelope" :showIcon="false"
                                     :required="true"/>
                        </div>
                        <div class="col-6">
                            <x-input label="Email пользователя" id="email" type="email" name="email"
                                     placeholder="Email пользователя" icon="fas fa-envelope" :showIcon="false"
                                     :required="true"/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <x-input label="Пароль" id="password" type="password" name="password" placeholder="Пароль"
                                     icon="fas fa-lock" :showIcon="false" :required="true"/>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleSelectRounded0">Роль</label>
                                <select class="custom-select rounded-0" name="role_id" id="exampleSelectRounded0" required>
                                    <option selected value="">Выберите роль для пользователя</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                  <x-button type="submit" class="btn btn-primary" text="Сохранить" position="end"/>
                </x-form>
            </div>
        </div>

    </section>
@endsection

@section('js-links')

@endsection

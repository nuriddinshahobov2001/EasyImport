<!-- index view content Powered by Nuriddin Shahobov-->

@extends('layouts.app')

@section('title')
@endsection

@section('css-links')

@endsection

@section('main')
    <x-page-header title="Создать продажу" :breadcrumbs="[
        ['name' => 'Дашбоард', 'url' => route('dashboard.index')],
        ['name' => 'Продажа', 'url' => route('sale.index')],
        ['name' => 'Создать продажу', 'url' => route('sale.create')],
    ]"/>
    <section class="content">
        <a href="{{ route('sale.index') }}" class="btn btn-danger mb-3">Назад</a>
        <x-alerts/>

        <x-form method="POST" action="{{ route('login') }}" :multipart="false">

            <div class="row">
                <div class="col-4">
                    <x-input
                        id="date"
                        type="date"
                        name="date"
                        placeholder="Выберите дату"
                        icon="fas fa-envelope"
                        :showIcon="false"
                        label="Дата создание документа"
                        :required="true"
                        :disabled="false"
                    />
                </div>
                <div class="col-4">
                    <x-input
                        id="comment"
                        type="text"
                        name="comment"
                        placeholder="Если есть что небуд напишите"
                        icon="fas fa-envelope"
                        :showIcon="false"
                        label="Комментарий"
                        :required="true"
                        :disabled="false"
                    />
                </div>
                <div class="col-4">
                    <x-input
                        id="user"
                        type="text"
                        name="user"
                        placeholder="Выберите дату"
                        icon="fas fa-envelope"
                        :showIcon="false"
                        label="Создано пользователью"
                        :required="false"
                        :disabled="true"
                        :value="auth()->user()->name"
                    />
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#productsModal">Добавить
                        товар <i class="fas fa-plus ml-2"></i></button>
                    <x-modal id="productsModal" size="lg" :isActiveBtnClose="true" title="Список товаров">
                        <h1>Hello</h1>
                    </x-modal>
                </div>
                <div class="card-body">

                </div>
            </div>
            @csrf

            <x-button type="submit" class="btn btn-primary" text="Вход" position="end"/>
        </x-form>

    </section>
@endsection

@section('js-links')
    <script>
        $(document).ready(function () {
            $('#date').val(new Date().toISOString().split('T')[0]);

        });
    </script>
@endsection

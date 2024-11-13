<!-- index view content Powered by Nuriddin Shahobov-->

@extends('layouts.app')

@section('title')
@endsection

@section('css-links')
@endsection

@section('main')
    <x-page-header title="Поступление" :breadcrumbs="[
        ['name' => 'Дашбоард', 'url' => route('dashboard.index')],
        ['name' => 'Поступление', 'url' => route('admission.index')],
    ]"/>
    <section class="content">
        <a href="{{ route('admission.create') }}" class="btn btn-primary mb-3">Создать поступление</a>
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Дата</th>
                        <th>Сумма</th>
                        <th>Соз. пользователю</th>
                        <th>Кол. товаров</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection

@section('js-links')
@endsection

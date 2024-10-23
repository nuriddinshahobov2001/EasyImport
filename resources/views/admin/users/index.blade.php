@extends('layouts.app')

@section('title')
    Пользователи
@endsection

@section('css-links')

@endsection

@section('main')
    <x-page-header title="Пользователи" :breadcrumbs="[
        ['name' => 'Дашбоард', 'url' => route('dashboard.index')],
        ['name' => 'Пользователи', 'url' => route('user.index')],
    ]"/>
    <section class="content">
        <a href="{{ route('user.create') }}" class="btn btn-primary mb-2">Созадть ползователь</a>
        <div class="card">
            <div class="card-body">
                <x-data-table
                    :headers="['ID', 'Имя','Действия']"
                    :model="$users"
                    :fields="['id', 'name',]"
                    :action="true"
                    :icons="['fas fa-eye', 'fas fa-edit', 'fas fa-trash']"
                    :routes="['user.show', 'user.edit', 'user.delete']"
                />
            </div>
        </div>
    </section>
@endsection

@section('js-links')
@endsection

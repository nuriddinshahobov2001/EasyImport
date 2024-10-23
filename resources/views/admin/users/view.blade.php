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
        ['name' => 'Просмотр пользовател', 'url' => route('user.show', $user->id)],
    ]"/>


    <section class="content">
        <div class="card">
            <div class="card-body">

            </div>
        </div>
    </section>

@endsection

@section('js-links')

@endsection

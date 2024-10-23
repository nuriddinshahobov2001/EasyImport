@extends('layouts.app')

@section('title')
    Продукты
@endsection

@section('css-links')

@endsection

@section('main')
    <x-page-header title="Книги" :breadcrumbs="[
        ['name' => 'Дашбоард', 'url' => route('dashboard.index')],
        ['name' => 'Книги', 'url' => route('product.index')],
    ]"/>
    <section class="content">
        <x-alerts/>
        <a href="{{ route('product.create') }}" class="btn btn-primary mb-2">Добавить книгу</a>
        <div class="card">
            <div class="card-body">

            </div>
        </div>
    </section>
@endsection

@section('js-links')
@endsection

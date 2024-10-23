@extends('layouts.app')

@section('title')
    Продукты
@endsection

@section('css-links')

@endsection

@section('main')
    <x-page-header title="Создать продукт" :breadcrumbs="[
        ['name' => 'Дашбоард', 'url' => route('dashboard.index')],
        ['name' => 'Продукты', 'url' => route('product.index')],
        ['name' => 'Создать продукт', 'url' => route('product.create')],
    ]"/>
    <section class="content">
        <x-alerts/>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <x-input
                            label="Имя продукт"
                            id="name"
                            type="text"
                            name="name"
                            placeholder="Введите имя"
                            icon="fas fa-envelope"
                            :showIcon="false"
                            :required="true"
                            value=""
                            :disabled="false"/>
                    </div>
                    <div class="col-4">
                        <x-input
                            label="Цена"
                            id="price"
                            type="number"
                            name="price"
                            placeholder="Введите цену"
                            icon="fas fa-envelope"
                            :showIcon="false"
                            :required="true"
                            value=""
                            :disabled="false"/>
                    </div>
                    <div class="col-4">
                        <x-input
                            label="Цена на продажу"
                            id="price_prod"
                            type="number"
                            name="price_prod"
                            placeholder="Введите цена продажа"
                            icon="fas fa-envelope"
                            :showIcon="false"
                            :required="true"
                            value=""
                            :disabled="false"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js-links')
@endsection

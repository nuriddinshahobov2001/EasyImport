<!-- index view content Powered by Nuriddin Shahobov -->

@extends('layouts.app')

@section('title')
    Список продуктов
@endsection

@section('css-links')
@endsection

@section('main')
    <x-page-header title="Список продуктов" :breadcrumbs="[
        ['name' => 'Дашбоард', 'url' => route('dashboard.index')],
        ['name' => 'Список продуктов', 'url' => route('products.index')],
    ]"/>

    <section class="content">
        <x-alerts/>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-7">
                        <x-data-table
                            :headers="['ID', 'Имя','Действия']"
                            :model="$prods"
                            :fields="['id', 'name']"
                            :action="true"
                            :icons="['fas fa-edit', 'fas fa-trash']"
                            :routes="['products.edit', 'products.delete']"
                        />
                    </div>
                    <div class="col-5">
                        @if(!isset($prodsEdit))
                            Новый продукт
                            <x-form method="POST" action="{{ route('products.store') }}" :multipart="false">
                                @csrf
                                <x-input label="Имя" id="name" type="text" name="name"
                                         placeholder="Введите имя" icon="fas fa-envelope" :showIcon="false"
                                         :required="true" :disabled="false"/>
                                <x-button type="submit" class="btn btn-primary" text="Сохранить" position="end"/>
                            </x-form>
                        @endif
                        @if(isset($prodsEdit))
                            <x-form method="POST" action="{{ route('products.update', $prodsEdit->id) }}" :multipart="false">
                                @csrf
                                @method('PATCH')
                                <x-input label="Имя" id="name" type="text" name="name"
                                         placeholder="Введите имя" icon="fas fa-envelope" :showIcon="false"
                                         :required="true" :disabled="false" :value="$prodsEdit->name"/>
                                <x-button type="submit" class="btn btn-primary" text="Сохранить" position="end"/>
                            </x-form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js-links')
@endsection

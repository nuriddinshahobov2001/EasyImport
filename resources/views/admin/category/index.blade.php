<!-- index view content Powered by Nuriddin Shahobov -->

@extends('layouts.app')

@section('title')
    Категория
@endsection

@section('css-links')
@endsection

@section('main')
    <x-page-header title="Роль" :breadcrumbs="[
        ['name' => 'Дашбоард', 'url' => route('dashboard.index')],
        ['name' => 'Категория', 'url' => route('category.index')],
    ]"/>

    <section class="content">
        <x-alerts/>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-7">
                        <x-data-table
                            :headers="['ID', 'Имя','Описания','Действия']"
                            :model="$categories"
                            :fields="['id', 'name','description']"
                            :action="true"
                            :icons="['fas fa-edit', 'fas fa-trash']"
                            :routes="['category.edit', 'category.delete']"
                        />
                    </div>
                    <div class="col-5">
                        @if(!isset($categoryEdit))
                            Новая категория
                            <x-form method="POST" action="{{ route('category.store') }}" :multipart="false">
                                @csrf
                                <x-input label="Имя" id="name" type="text" name="name"
                                         placeholder="Введите имя" icon="fas fa-envelope" :showIcon="false"
                                         :required="true" :disabled="false"/>
                                <x-input label="Описания" id="description" type="text" name="description"
                                         placeholder="Введите описания" icon="fas fa-envelope" :showIcon="false"
                                         :required="false" :disabled="false"/>
                                <x-button type="submit" class="btn btn-primary" text="Сохранить" position="end"/>
                            </x-form>
                        @endif
                        @if(isset($categoryEdit))
                            <x-form method="POST" action="{{ route('category.update', $categoryEdit->id) }}" :multipart="false">
                                @csrf
                                @method('PATCH')
                                <x-input label="Имя" id="name" type="text" name="name"
                                         placeholder="Введите имя" icon="fas fa-envelope" :showIcon="false"
                                         :required="true" :disabled="false" :value="$categoryEdit->name"/>
                                <x-input label="Описания" id="description" type="text" name="description"
                                         placeholder="Введите описания" icon="fas fa-envelope" :showIcon="false"
                                         :required="false" :disabled="false" :value="$categoryEdit->description"/>
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

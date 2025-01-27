<!-- index view content Powered by Nuriddin Shahobov -->

@extends('layouts.app')

@section('title')
    Единицы измерения
@endsection

@section('css-links')
@endsection

@section('main')
    <x-page-header title="Единицы измерения" :breadcrumbs="[
        ['name' => 'Дашбоард', 'url' => route('dashboard.index')],
        ['name' => 'Единицы измерения', 'url' => route('units.index')],
    ]"/>

    <section class="content">
        <x-alerts/>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-7">
                        <x-data-table
                            :headers="['ID', 'Имя','Действия']"
                            :model="$units"
                            :fields="['id', 'name']"
                            :action="true"
                            :icons="['fas fa-edit', 'fas fa-trash']"
                            :routes="['units.edit', 'units.delete']"
                        />
                    </div>
                    <div class="col-5">
                        @if(!isset($unitsEdit))
                            Новая единица
                            <x-form method="POST" action="{{ route('units.store') }}" :multipart="false">
                                @csrf
                                <x-input label="Имя" id="name" type="text" name="name"
                                         placeholder="Введите имя" icon="fas fa-envelope" :showIcon="false"
                                         :required="true" :disabled="false"/>
                                <x-button type="submit" class="btn btn-primary" text="Сохранить" position="end"/>
                            </x-form>
                        @endif
                        @if(isset($unitsEdit))
                            <x-form method="POST" action="{{ route('units.update', $unitsEdit->id) }}" :multipart="false">
                                @csrf
                                @method('PATCH')
                                <x-input label="Имя" id="name" type="text" name="name"
                                         placeholder="Введите имя" icon="fas fa-envelope" :showIcon="false"
                                         :required="true" :disabled="false" :value="$unitsEdit->name"/>
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

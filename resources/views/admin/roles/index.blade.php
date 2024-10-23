@extends('layouts.app')

@section('title')
    Роль
@endsection

@section('css-links')
@endsection

@section('main')
    <x-page-header title="Роль" :breadcrumbs="[
        ['name' => 'Дашбоард', 'url' => route('dashboard.index')],
        ['name' => 'Роль', 'url' => route('role.index')],
    ]"/>
    <section class="content">
        <x-alerts/>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-7">
                        <x-data-table
                            :headers="['ID', 'Имя','Действия']"
                            :model="$roles"
                            :fields="['id', 'name',]"
                            :action="true"
                            :icons="['fas fa-eye', 'fas fa-edit', 'fas fa-trash']"
                            :routes="['role.show', 'role.edit', 'role.delete']"
                        />
                    </div>
                    <div class="col-5">
                        @if(isset($show))
                            <x-input label="Имя" id="name" type="text" name="name"
                                     placeholder="Введите имя ролей" icon="fas fa-envelope" :showIcon="false"
                                     :required="true" :value="$show->name" :disabled="true"/>
                            <x-input label="Дата создание" id="name" type="text" name="name"
                                     placeholder="Введите имя ролей" icon="fas fa-envelope" :showIcon="false"
                                     :required="true" :value="$show->created_at" :disabled="true"/>
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('role.index') }}" class="btn btn-secondary mr-2">Отмена</a>
                            </div>
                        @endif
                        @if(!isset($edit) && !isset($show))
                            Создать новый роль
                            <x-form method="POST" action="{{ route('role.store') }}" :multipart="false">
                                @csrf
                                <x-input label="Имя" id="name" type="text" name="name"
                                         placeholder="Введите имя ролей" icon="fas fa-envelope" :showIcon="false"
                                         :required="true" :disabled="false"/>
                                <x-button type="submit" class="btn btn-primary" text="Сохранить" position="end"/>
                            </x-form>
                        @elseif(!isset($show) && isset($edit))
                            Изменить роль : <b>{{ $edit->name }}</b>
                            <x-form method="POST" action="{{ route('role.update', $edit->id) }}" :multipart="false">
                                @csrf
                                @method('PATCH')
                                <x-input label="Роль" id="name" type="text" name="name"
                                         placeholder="Введите имя ролей" icon="fas fa-envelope" :showIcon="false"
                                         :required="true" :value="$edit->name" :disabled="false   "/>
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('role.index') }}" class="btn btn-secondary mr-2">Отмена</a>
                                    <button type="submit" class="btn btn-primary">Сохранить</button>
                                </div>

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

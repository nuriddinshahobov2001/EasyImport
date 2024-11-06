@extends('layouts.app')

@section('title')

@endsection

@section('css-links')

@endsection

@section('main')
    <x-page-header title="Теги для книг" :breadcrumbs="[
        ['name' => 'Дашбоард', 'url' => route('dashboard.index')],
        ['name' => 'Теги для книг', 'url' => route('tags.index')],
    ]"/>
    <section class="content">
        <x-alerts/>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <x-data-table
                            :headers="['ID', 'Имя', 'Действия']"
                            :model="$tags"
                            :fields="['id', 'name',]"
                            :action="true"
                            :icons="['fas fa-eye', 'fas fa-edit', 'fas fa-trash']"
                            :routes="['tags.show', 'tags.edit', 'tags.delete']"
                        />
                    </div>
                    <div class="col-6">
                        @if(!isset($tag) && !isset($edit))
                            @include('admin.product.tags.create')
                        @elseif(!isset($edit) && isset($tag))
                            @include('admin.product.tags.view')
                        @elseif(isset($edit) && !isset($tag))
                            @include('admin.product.tags.edit')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js-links')
@endsection

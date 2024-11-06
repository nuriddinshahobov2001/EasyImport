@extends('layouts.app')

@section('title')
    Авторы
@endsection

@section('css-links')
    <style>
        #image-author, #image{
            width: 200px;
            height: 200px;
        }
        .image-preview {
            width: 200px;
            height: 200px;
            border: 2px solid #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            cursor: pointer;
        }

        .image-preview img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
        }

        .change-photo-text {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
        }

        .image-preview:hover .change-photo-text {
            display: block; /* Показывать надпись при наведении */
        }


    </style>
@endsection

@section('main')
    <x-page-header title="Авторы книг" :breadcrumbs="[
        ['name' => 'Дашбоард', 'url' => route('dashboard.index')],
        ['name' => 'Авторы книг', 'url' => route('author.index')],
    ]"/>
    <section class="content">
        <x-alerts/>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <x-data-table
                            :headers="['ID', 'Имя', 'Действия']"
                            :model="$authors"
                            :fields="['id', 'name',]"
                            :action="true"
                            :icons="['fas fa-eye', 'fas fa-edit', 'fas fa-trash']"
                            :routes="['author.show', 'author.edit', 'author.delete']"
                        />
                    </div>
                    <div class="col-6">
                        @if(!isset($author) && !isset($edit))
                            @include('admin.product.author.create')
                        @elseif(isset($author))
                            @include('admin.product.author.view')
                        @elseif(isset($edit))
                            @include('admin.product.author.edit')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js-links')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
@endsection

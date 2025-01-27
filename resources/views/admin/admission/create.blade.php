@extends('layouts.app')

@section('title')
    Создать поступление
@endsection

@section('css-links')

@endsection

@section('main')
    <x-page-header title="Создать поступление" :breadcrumbs="[
        ['name' => 'Дашбоард', 'url' => route('dashboard.index')],
        ['name' => 'Продажа', 'url' => route('admission.index')],
        ['name' => 'Создать поступление', 'url' => route('admission.create')],
    ]"/>
    <section class="content">
        <a href="{{ route('admission.index') }}" class="btn btn-danger mb-3">Назад</a>
        <x-alerts/>

        <x-form method="POST" action="{{ route('admission.index') }}" :multipart="false">

            <div class="row">
                <div class="col-4">
                    <x-input
                        id="date"
                        type="date"
                        name="date"
                        placeholder="Выберите дату"
                        icon="fas fa-envelope"
                        :showIcon="false"
                        label="Дата создание документа"
                        :required="true"
                        :disabled="false"
                    />
                </div>
                <div class="col-4">
                    <x-input
                        id="comment"
                        type="text"
                        name="comment"
                        placeholder="Если есть что небуд напишите"
                        icon="fas fa-envelope"
                        :showIcon="false"
                        label="Комментарий"
                        :required="false"
                        :disabled="false"
                    />
                </div>
                <div class="col-4">
                    <x-input
                        id="user"
                        type="text"
                        name="user"
                        placeholder="Выберите дату"
                        icon="fas fa-envelope"
                        :showIcon="false"
                        label="Создано пользователью"
                        :required="false"
                        :disabled="true"
                        :value="auth()->user()->name"
                    />
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#productsModal">Добавить
                        товар <i class="fas fa-plus ml-2"></i></button>
                    <x-modal id="productsModal" size="lg" :isActiveBtnClose="true" title="Список товаров">
                        <table class="table table-bordered ">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Имя</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr class="productList">
                                    <th>{{ $product->id }}</th>
                                    <th>{{ $product->name }}</th>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </x-modal>


                    <button type="button" class="btn btn-danger">
                        Удалить все товары<i class="fas fa-trash ml-2"></i></button>
                </div>
                <div class="card-body">
                    <table class="table table-hover text-nowrap" >
                        <thead>
                        <tr>
                            <th>ID - продукт</th>
                            <th>Продукт</th>
                            <th>Единица</th>
                            <th>Количество</th>
                            <th>Цена</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody id="newTableBody">
                        </tbody>
                    </table>
                </div>
            </div>
            @csrf

        </x-form>

    </section>
@endsection

@section('js-links')
    <script>
        $(document).ready(function () {
            $('#date').val(new Date().toISOString().split('T')[0]);
            const newTableBody  = $('#newTableBody');
            const productList = $('.productList'); // Если это массив, используйте класс вместо id
            productList.each(function () {
                $(this).hover(() => {
                        $(this).css('background-color', '#f2f2f2');
                        $(this).css('cursor', 'pointer');
                    },
                    () => {
                        $(this).css('background-color', 'white');
                    }
                );
                $(this).click(() => {
                    $(this).css('background-color', '#c6fdb0');

                    const rowData = $(this).find('th').map(function () {
                        return $(this).text().trim();
                    }).get();

                    const newRow = `
                                        <tr>
                                            <td width="15">${rowData[0]}</td>
                                            <td>${rowData[1]}</td>
                                            <td>${rowData[1]}</td>
                                            <td>${rowData[1]}</td>
                                            <td>${rowData[1]}</td>
                                            <td><span class="badge bg-danger p-2" id="deletedButton"><i class="fas fa-trash"></i></span></td>
                                        </tr>
                                    `;

                    // Добавляем новую строку в таблицу
                    newTableBody.append(newRow);
                    $('#productsModal').modal('hide');
                })
            });

            $(document).on('click', '#deletedButton', function () {
                // Показываем окно подтверждения
                const isConfirmed = confirm("Вы уверены, что хотите удалить?");

                if (isConfirmed) {
                    $(this).closest('tr').remove();
                }
            });
        });

    </script>
@endsection

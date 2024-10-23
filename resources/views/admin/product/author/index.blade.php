@extends('layouts.app')

@section('title')
    Авторы
@endsection

@section('css-links')
    <style>
        #image-author{
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
                        @if(!isset($author))
                            <h1 class="mb-3">Создать новый автор</h1>
                            <x-form action="{{ route('author.store') }}" :multipart="true">
                                @csrf
                                <x-input
                                    label="Имя автора"
                                    id="name"
                                    type="text"
                                    name="name"
                                    placeholder="Введите имя автора"
                                    icon="fas fa-envelope"
                                    :showIcon="false"
                                    :required="true"
                                    value=""
                                    :disabled="false"/>

                                <label for="file-input">Фото автора</label>
                                <div class="image-container" id="image-container">
                                    <div class="image-preview" id="image-preview" style="display: none; position: relative;">
                                        <img id="image" src="" alt="Image Preview" />
                                        <span class="change-photo-text" style="display: none;">Изменить фото</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="photo" id="file-input" accept="image/*">
                                    <button type="button" id="crop-button" class="badge bg-primary p-2" style="display: none">Обрезать</button>
                                </div>

                                <!-- Контейнер для отображения обрезанного изображения -->
                                <div id="cropped-result" style="display: none;">
                                    <img id="cropped-image" src="" alt="Cropped Image" class="mb-1"/>
                                    <button type="button" id="change-photo" class="badge bg-primary p-2 mb-2" style="display: none">Загрузить новое фото</button>
                                </div>

                                <div class="from-group">
                                    <textarea name="description" class="form-control mb-3" id="" cols="10" rows="5"></textarea>
                                </div>
                                <x-button type="submit" class="btn btn-primary" text="Сохранить" position="end"/>
                            </x-form>
                        @elseif(isset($author))
                            <x-input
                                label="Имя автора"
                                id="name"
                                type="text"
                                name="name"
                                placeholder="Введите имя автора"
                                icon="fas fa-envelope"
                                :showIcon="false"
                                :required="true"
                                :value="$author->name"
                                :disabled="false"/>

                            <label for="file-input">Фото автора</label>
                            <img id="image-author" src="{{($author->photo === null) ? '' : asset('storage/' . $author->photo) }}" class="mb-3" alt="Image Preview" />
                            <div class="from-group">
                                <textarea name="description" class="form-control mb-3" id="" cols="10" rows="5">{{ $author->description }}</textarea>
                            </div>
                            <a href="{{ route('author.index') }}" class="btn btn-secondary">Отмена</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js-links')
    <!-- Подключаем стили Cropper.js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" rel="stylesheet"/>

    <!-- Подключаем саму библиотеку Cropper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>

    <script>
        let cropper;

        document.getElementById('file-input').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const imgElement = document.getElementById('image');
                    imgElement.src = e.target.result;

                    // Показать блок с изображением и кнопку "Обрезать"
                    document.getElementById('image-preview').style.display = 'block';
                    document.getElementById('crop-button').style.display = 'block';

                    // Скрыть input:file
                    document.getElementById('file-input').style.display = 'none';

                    // Инициализация Cropper.js
                    if (cropper) {
                        cropper.destroy(); // Уничтожить предыдущий cropper, если уже был создан
                    }
                    cropper = new Cropper(imgElement, {
                        aspectRatio: 1, // Соотношение сторон (например, 1 для квадрата)
                        viewMode: 1,
                    });
                };

                reader.readAsDataURL(file); // Преобразовать файл в URL
            }
        });

        document.getElementById('crop-button').addEventListener('click', function() {
            if (cropper) {
                const canvas = cropper.getCroppedCanvas({
                    width: 200, // Ширина обрезанного изображения
                    height: 200, // Высота обрезанного изображения
                });

                // Получаем Base64 изображение
                const croppedImage = canvas.toDataURL('image/jpeg');

                // Показать обрезанное изображение в превью
                const croppedImageElement = document.getElementById('cropped-image');
                croppedImageElement.src = croppedImage;

                // Создать новый файл из Base64
                const blob = dataURItoBlob(croppedImage);
                const newFile = new File([blob], 'cropped-image.jpg', { type: 'image/jpeg' });

                // Создать DataTransfer для обновления input
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(newFile);
                document.getElementById('file-input').files = dataTransfer.files;

                // Скрыть блок с исходным изображением и кнопку "Обрезать"
                document.getElementById('image-preview').style.display = 'none';
                document.getElementById('crop-button').style.display = 'none';

                // Показать результат обрезки и кнопку для загрузки нового фото
                document.getElementById('cropped-result').style.display = 'block';
                document.getElementById('change-photo').style.display = 'block';
            }
        });

        // Функция для преобразования Data URL в Blob
        function dataURItoBlob(dataURI) {
            const byteString = atob(dataURI.split(',')[1]);
            const mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0];
            const ab = new ArrayBuffer(byteString.length);
            const ia = new Uint8Array(ab);
            for (let i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }
            return new Blob([ab], { type: mimeString });
        }

        document.getElementById('change-photo').addEventListener('click', function() {
            // Скрыть результат обрезки
            document.getElementById('cropped-result').style.display = 'none';
            document.getElementById('change-photo').style.display = 'none';

            // Показать input:file для выбора нового файла
            document.getElementById('file-input').style.display = 'block';
            document.getElementById('file-input').value = ''; // Сбросить выбранное значение
        });


    </script>
@endsection

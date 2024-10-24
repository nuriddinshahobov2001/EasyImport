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

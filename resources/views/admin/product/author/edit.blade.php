<h1 class="mb-3">Редактировать автора</h1>
<x-form action="{{ route('author.update', $edit->id) }}" :multipart="true" method="POST">
    @csrf
    @method('PATCH')

    <x-input
        label="Имя автора"
        id="name"
        type="text"
        name="name"
        placeholder="Введите имя автора"
        :value="$edit->name"
        icon="fas fa-envelope"
        :showIcon="false"
        :required="true"
        :disabled="false"/>

    <label for="file-input">Фото автора</label>
    <div class="image-container" id="image-container">
        <div class="image-preview" id="image-preview" style="position: relative;">
            <!-- Если у автора уже есть фото, отображаем его -->
            <img id="image" src="{{ asset('storage/' . $edit->photo) }}" alt="Image Preview" />
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

    <div class="form-group">
        <textarea name="description" class="form-control mb-3" cols="10" rows="5">{{ $edit->description }}</textarea>
    </div>
    <div class="d-flex justify-content-end form-group">
        <a href="{{ route('author.index') }}" class="btn btn-secondary mx-2">Отмена</a>
        <x-button type="submit" class="btn btn-primary" text="Сохранить" position="end"/>
    </div>
</x-form>

<script>
    let cropper;
    const imgElement = document.getElementById('image');
    const fileInput = document.getElementById('file-input');
    const cropButton = document.getElementById('crop-button');

    // Показать кнопку обрезки только после выбора нового файла
    fileInput.addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                imgElement.src = e.target.result;

                document.getElementById('image-preview').style.display = 'block';
                cropButton.style.display = 'block';
                fileInput.style.display = 'none';

                if (cropper) cropper.destroy();
                cropper = new Cropper(imgElement, {
                    aspectRatio: 1,
                    viewMode: 1,
                });
            };
            reader.readAsDataURL(file);
        }
    });

    // Обрезка изображения
    cropButton.addEventListener('click', function() {
        if (cropper) {
            const canvas = cropper.getCroppedCanvas({ width: 200, height: 200 });
            const croppedImage = canvas.toDataURL('image/jpeg');
            const croppedImageElement = document.getElementById('cropped-image');
            croppedImageElement.src = croppedImage;

            const blob = dataURItoBlob(croppedImage);
            const newFile = new File([blob], 'cropped-image.jpg', { type: 'image/jpeg' });

            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(newFile);
            fileInput.files = dataTransfer.files;

            document.getElementById('image-preview').style.display = 'none';
            cropButton.style.display = 'none';
            document.getElementById('cropped-result').style.display = 'block';
            document.getElementById('change-photo').style.display = 'block';
        }
    });

    // Преобразование Data URL в Blob
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

    // Кнопка для загрузки нового фото
    document.getElementById('change-photo').addEventListener('click', function() {
        document.getElementById('cropped-result').style.display = 'none';
        document.getElementById('change-photo').style.display = 'none';
        fileInput.style.display = 'block';
        fileInput.value = '';
    });
</script>

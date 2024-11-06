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

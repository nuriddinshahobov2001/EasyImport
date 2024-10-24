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
    :disabled="true"/>

<label for="file-input">Фото автора</label>
<img id="image-author" src="{{($author->photo === null) ? '' : asset('storage/' . $author->photo) }}" class="mb-3" alt="Image Preview" />
<div class="from-group">
    <textarea disabled="" name="description" class="form-control mb-3" id="" cols="10" rows="5">{{ $author->description }}</textarea>
</div>
<a href="{{ route('author.index') }}" class="btn btn-secondary">Отмена</a>

<h1 class="mb-3">Изменить тег</h1>
<x-form method="POST" action="{{ route('tags.update', $edit->id) }}" :multipart="true">
    @csrf
    @method('PATCH')
    <x-input
        label="Тег"
        id="name"
        type="text"
        name="name"
        placeholder="Введите тег"
        icon="fas fa-envelope"
        :showIcon="false"
        :required="true"
        :value="$edit->name"
        :disabled="false"/>
    <div class="d-flex justify-content-end">
        <a href="{{ route('tags.index') }}" class="btn btn-secondary mx-2">Назад</a>
        <x-button type="submit" class="btn btn-primary" text="Изменить" position="end"/>
    </div>
</x-form>

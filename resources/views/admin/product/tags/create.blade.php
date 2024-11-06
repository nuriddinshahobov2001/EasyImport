<h1 class="mb-3">Создать новый тег для книг</h1>
<x-form method="POST" action="{{ route('tags.store') }}" :multipart="true">
@csrf
    <x-input
    label="Тег"
    id="name"
    type="text"
    name="name"
    placeholder="Введите тег"
    icon="fas fa-envelope"
    :showIcon="false"
    :required="true"
    value=""
    :disabled="false"/>
    <x-button type="submit" class="btn btn-primary" text="Сохранить" position="end"/>
</x-form>

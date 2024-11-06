<x-input
    label="Тег"
    id="name"
    type="text"
    name="name"
    placeholder="Тег"
    icon="fas fa-envelope"
    :showIcon="false"
    :required="true"
    :value="$tag->name"
    :disabled="false"/>

<a href="{{ route('tags.index') }}" class="btn btn-secondary">Отмена</a>

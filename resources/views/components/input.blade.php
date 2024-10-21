<div class="input-group mb-3">
    <input type="{{ $type }}" name="{{ $name }}" class="form-control" placeholder="{{ $placeholder }}" required="{{ $required }}">

    @if($showIcon)
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="{{ $icon }}"></span>
            </div>
        </div>
    @endif
</div>

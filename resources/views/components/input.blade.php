<div class="{{ $label != null ? 'form-group' : 'input-group' }} mb-3">
    @if($label != null)
        <label for="{{ $id }}">{{ $label }} @if($required)<span class="text-danger">*</span> @endif</label>
    @endif
    <input id="{{ $id }}" type="{{ $type }}" value="{{ $value }}" name="{{ $name }}" class="form-control"
           @if($disabled) disabled @endif
           placeholder="{{ $placeholder }}"
           @if($required) required @endif
    >

    @if($showIcon)
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="{{ $icon }}"></span>
            </div>
        </div>
    @endif
</div>

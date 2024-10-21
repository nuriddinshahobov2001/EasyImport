<form method="{{ $method }}" action="{{ $action }}"
      @if($multipart) enctype="multipart/form-data" @endif>

    {{ $slot }}
</form>

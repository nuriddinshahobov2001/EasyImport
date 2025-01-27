<div class="modal fade" id="{{ $id }}"  aria-modal="true" role="dialog" data-bs-backdrop="static" data-bs-keyboard="false" >
    <div class="modal-dialog modal-{{ $size }}" >
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ $title }}</h4>
                @if($isActiveBtnClose)
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                @endif
            </div>
            <div class="modal-body" style="max-height: 600px; overflow: auto">
                {{ $slot }}
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal" id="cancelButton">Отмена</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

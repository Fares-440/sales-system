<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;">
                {{ __('category_type_trans.delete') }} / {{ $name }}</h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form wire:submit.prevent="submit" method="POST">
            <div class="modal-body">
                {{ trans('category_type_trans.delete_category_type') }}
                <div class="form-group">
                    <input id="delete_id" type="hidden" name="id" class="form-control" <div class="modal-footer">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">{{ __('main_trans.close') }}</button>
                <button type="submit" class="btn btn-danger">{{ __('main_trans.delete') }}</button>
            </div>
        </form>
    </div>
</div>

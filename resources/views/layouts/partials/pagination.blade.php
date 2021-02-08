@if($data->hasPages() && $data->isNotEmpty())
    <hr class="bt-3"/>

    <div class="d-flex justify-content-center">
        {{ $data->links('vendor.pagination.bootstrap-4') }}
    </div>
@endif

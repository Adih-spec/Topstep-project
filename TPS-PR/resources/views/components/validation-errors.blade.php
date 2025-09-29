@if ($errors->any())
    <div {{ $attributes->merge(['class' => 'alert alert-danger alert-dismissible fade show']) }} role="alert">
        <strong>{{ __('Whoops! Something went wrong.') }}</strong>
        <ul class="mt-2 mb-0 ps-3">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<!-- End of Validation Errors Component -->
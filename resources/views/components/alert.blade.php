<?php

use Illuminate\Support\ViewErrorBag

/**
 * @var ViewErrorBag $errors
 */
?>

@if($errors->any())
    <div class="alert alert-danger my-3">
        <div class="alert-title">
            <strong>{{ __('Whoops! Something went wrong!') }}!</strong>
        </div>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if($message = session()->get('success'))
    <div class="alert alert-success my-3">
        {{ $message }}
    </div>
@endif

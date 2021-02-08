<?php

use App\Models\EventLog;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @var LengthAwarePaginator $data
 * @var EventLog $item
 * @var string $title
 */
?>

@extends('layouts.master')

@section('title') {{ $title }} @endsection

@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"><i class="{{ EventLog::icon() }}"></i> {{ $title }}</h1>
        </div>
        <div class="col-sm-6">
            <div class="text-right">
                <small>
                    display {{ $data->count() }}/{{ $data->total() }}
                    (page {{ $data->currentPage() }} of {{ $data->lastPage() }})
                </small>
            </div>
        </div>
    </div>
@endsection

@section('content')

    @include('event-log._form_search')

    @include('event-log._table_data')

    <div class="modal fade" id="modal" role="dialog"></div>

@endsection

@push('scripts')
    <script src="{{ asset('js/pages/event-log.js') }}"></script>
@endpush

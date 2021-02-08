<?php

use App\Models\Aggregate;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @var LengthAwarePaginator $data
 * @var Aggregate $item
 */
?>

@extends('layouts.master')

@section('title') {{ $title }} @endsection

@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"><i class="{{ Aggregate::icon() }}"></i> {{ $title }}</h1>
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

    @include('aggregate._form_search')

    @include('aggregate._table_data')

@endsection

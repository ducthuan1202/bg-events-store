<?php

use App\Models\Event;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @var LengthAwarePaginator $data
 * @var Event $item
 * @var string $title
 */
?>

@extends('layouts.master')

@section('title') {{ $title }} @endsection

@section('content-header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0"><i class="{{ Event::icon() }}"></i> {{ $title }}</h1>
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
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                    <thead>
                    <tr>
                        <th>{{ Event::getAttributeLabel('id') }}</th>
                        <th>{{ Event::getAttributeLabel('aggregate_id') }}</th>
                        <th>{{ Event::getAttributeLabel('version') }}</th>
                        <th>{{ Event::getAttributeLabel('created_time') }}</th>
                        <th>{{ Event::getAttributeLabel('updated_time') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($data->isNotEmpty())
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->aggregate_id }}</td>
                                <td>{{ $item->version }}</td>
                                <td>{{ $item->created_time }}</td>
                                <td>{{ $item->updated_time }}</td>
                                <td>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="100%">{{ __('No data') }}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        @include('layouts.partials.pagination')

    </div>

@endsection

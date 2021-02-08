<?php

use App\Models\Event;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use App\Models\Aggregate;

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

    @include('event._form_search')

    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered table-hover dataTable dtr-inline">
                    <thead>
                    <tr>
                        <th>{{ Event::getAttributeLabel('id') }}</th>
                        <th>{{ Event::getAttributeLabel('aggregate_id') }}</th>
                        <th class="text-center">{{ Event::getAttributeLabel('version') }}</th>
                        <th class="text-center">{{ Event::getAttributeLabel('created_time') }}</th>
                        <th class="text-center">{{ Event::getAttributeLabel('updated_time') }}</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($data->isNotEmpty())
                        @foreach($data as $item)
                            <tr>
                                <td>
                                    <span class="text-muted">{{ $item->id }}</span>
                                </td>
                                <td>
                                    {{ $item->getAggregateName() }}
                                </td>
                                <td class="text-center">
                                    {{ $item->version }}
                                </td>
                                <td class="text-center">
                                    <span class="text-muted">{{ $item->created_time }}</span>
                                </td>
                                <td class="text-center">
                                    <span class="text-secondary">{{ $item->updated_time }}</span>
                                </td>
                                <td class="text-right">
                                    <a href="{{ route('events-logs.index', ['event_id' => $item->id]) }}"
                                       target="_blank"
                                       title="Click to view [Event Logs]"
                                       class="btn btn-outline-secondary btn-xs"
                                       data-role="events-logs"
                                       data-id="{{ $item->id }}">
                                        <i class="{{ \App\Models\EventLog::icon() }}"></i>
                                        <span class="badge badge-success">{{ $item->eventLogs->count() }}</span>
                                    </a>

                                    <a href="{{ route('events-subscribes.index', ['event_id' => $item->id]) }}"
                                       target="_blank"
                                       title="Click to view [Event Subscribes]"
                                       class="btn btn-outline-secondary btn-xs"
                                       data-role="events-subscribes"
                                       data-id="{{ $item->id }}">
                                        <i class="{{ \App\Models\EventSubscribe::icon() }}"></i>
                                        <span class="badge badge-success">{{ $item->eventSubscribes->count() }}</span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="100%">{{ 'No data' }}</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        @include('layouts.partials.pagination')

    </div>

@endsection

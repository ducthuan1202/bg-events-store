<?php

use App\Models\EventLog;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @var LengthAwarePaginator $data
 * @var EventLog $item
 * @var string $title
 */
?>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0" id="data-table">
                <thead>
                <tr>
                    <th>{{ EventLog::getAttributeLabel('id') }}</th>
                    <th>{{ EventLog::getAttributeLabel('aggregate_id') }}</th>
                    <th class="text-center">{{ EventLog::getAttributeLabel('event_id') }}</th>
                    <th class="text-center">{{ EventLog::getAttributeLabel('version') }}</th>
                    <th class="text-center">{{ EventLog::getAttributeLabel('shipped') }}</th>
                    <th>{{ EventLog::getAttributeLabel('created_time') }}</th>
                    <th>{{ EventLog::getAttributeLabel('updated_time') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @if($data->isNotEmpty())
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->getAggregateName() }}</td>
                            <td class="text-center">{{ $item->event_id }}</td>
                            <td class="text-center">{{ $item->version }}</td>
                            <td class="text-center">{!! $item->formatShippedHtml() !!}</td>
                            <td>{{ $item->created_time }}</td>
                            <td>{{ $item->updated_time }}</td>
                            <td>
                                <a href="javascript:;"
                                   class="btn btn-outline-secondary btn-xs"
                                   data-role="get-detail-event-log"
                                   data-url="{{ route('events-logs.show', ['id' =>$item->id]) }}">
                                    <i class="fas fa-air-freshener"></i>
                                </a>
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

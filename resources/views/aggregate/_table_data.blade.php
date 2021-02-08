<?php

use App\Models\Aggregate;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @var LengthAwarePaginator $data
 * @var Aggregate $item
 * @var array $params
 */
?>

<div class="card">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table m-0">
                <thead>
                <tr>
                    <th>{{ Aggregate::getAttributeLabel('id') }}</th>
                    <th>{{ Aggregate::getAttributeLabel('name') }}</th>
                    <th class="text-center">
                        {{__('Events')}}
                    </th>
                    <th class="text-center">
                        {{ Aggregate::getAttributeLabel('source_id') }}
                    </th>
                    <th class="text-center">{{ Aggregate::getAttributeLabel('created_time') }}</th>
                    <th class="text-center">{{ Aggregate::getAttributeLabel('updated_time') }}</th>
                </tr>
                </thead>
                <tbody>
                @if($data->isNotEmpty())
                    @foreach($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>
                                {{ $item->name }}
                                @if(!empty($item->description))
                                    <p>{{ $item->description }}</p>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('events.index', ['aggregate_id' => $item->id]) }}" target="_blank"
                                   title="click to view Events">
                                    {{ $item->events->count() }}
                                </a>
                            </td>
                            <td class="text-center">{{ $item->source_id }}</td>
                            <td class="text-center">{{ $item->created_time }}</td>
                            <td class="text-center">{{ $item->updated_time }}</td>
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

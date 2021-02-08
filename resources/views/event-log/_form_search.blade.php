<?php

use App\Models\EventLog;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use App\Models\Aggregate;

/**
 * @var LengthAwarePaginator $data
 * @var EventLog $item
 * @var string $title
 * @var array $params
 */

$id = Arr::get($params, 'id', '');
$aggregateID = Arr::get($params, 'aggregate_id', '');
$shipped = Arr::get($params, 'shipped', '');
$aggregateDropdownData = Aggregate::dropdownListData('Select one...');
$shippedDropdownData = EventLog::dropdownShippedList('Select one...')
?>
<div class="card">
    <div class="card-body">

        {{ Form::open(['method' => 'GET', 'url' => route('events-logs.index')]) }}

        <div class="row">
            <div class="col-6 col-md-3">
                <div class="form-group">
                    <label>{{ EventLog::getAttributeLabel('id') }}</label>
                    {{ Form::text('id', $id, ['class'=> 'form-control', 'placeholder'=>'Search by ID']) }}
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="form-group">
                    <label>{{ EventLog::getAttributeLabel('aggregate_id') }}</label>
                    {{ Form::select( 'aggregate_id', $aggregateDropdownData, $aggregateID, ['class'=> 'form-control']) }}
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="form-group">
                    <label>{{ EventLog::getAttributeLabel('shipped') }}</label>
                    {{ Form::select( 'shipped', $shippedDropdownData, $shipped, ['class'=> 'form-control']) }}
                </div>
            </div>

            <div class="col-6 col-md-3">
                {{ Form::submit(__('Search'), ['class' => 'btn btn-primary', 'style' => 'margin-top: 32px']) }}
            </div>
        </div>

        {{ Form::close() }}

    </div>
</div>

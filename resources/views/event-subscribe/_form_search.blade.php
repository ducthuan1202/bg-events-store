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
<div class="card">
    <div class="card-body">

        {{ Form::open(['method' => 'GET', 'url' => route('events.index')]) }}

        <div class="row">
            <div class="col-6 col-md-3">
                <div class="form-group">
                    <label>Keyword</label>
                    {{ Form::text('keyword', Arr::get($params, 'keyword', ''), ['class'=> 'form-control', 'placeholder'=>'Search by keyword']) }}
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="form-group">
                    <label>{{ Event::getAttributeLabel('aggregate_id') }}</label>
                    {{ Form::select( 'aggregate_id', Aggregate::dropdownListData('Select one'), Arr::get($params, 'aggregate_id', ''), ['class'=> 'form-control']) }}
                </div>
            </div>

            <div class="col-6 col-md-3">
                {{ Form::submit('Search', ['class' => 'btn btn-primary', 'style' => 'margin-top: 32px']) }}
            </div>
        </div>

        {{ Form::close() }}

    </div>
</div>

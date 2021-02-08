<?php

use App\Models\Event;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use App\Models\Aggregate;

/**
 * @var LengthAwarePaginator $data
 * @var Event $item
 * @var string $title
 * @var array $params
 */

$id = Arr::get($params, 'id', '');
$keyword = Arr::get($params, 'keyword', '');
?>
<div class="card">
    <div class="card-body">

        {{ Form::open(['method' => 'GET', 'url' => route('aggregates.index')]) }}

        <div class="row">

            <div class="col-6 col-md-2">
                <div class="form-group">
                    <label>{{ __('ID') }}</label>
                    {{ Form::text('id', $id, ['class'=> 'form-control', 'placeholder'=>'Search by ID']) }}
                </div>
            </div>

            <div class="col-6 col-md-3">
                <div class="form-group">
                    <label>Keyword</label>
                    {{ Form::text('keyword', $keyword, ['class'=> 'form-control', 'placeholder'=>'Search by name']) }}
                </div>
            </div>

            <div class="col-6 col-md-3">
                {{ Form::submit('Search', ['class' => 'btn btn-primary', 'style' => 'margin-top: 32px']) }}
            </div>
        </div>

        {{ Form::close() }}

    </div>
</div>

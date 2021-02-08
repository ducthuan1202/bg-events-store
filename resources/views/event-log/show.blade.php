<?php

use App\Models\EventLog;

/**
 * @var EventLog $model
 */
$payload = json_decode($model->payload, true);

?>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Detail event log: ${{ $model->event_id }}</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body m-0 p-0">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>{{ EventLog::getAttributeLabel('id') }}</td>
                                <td>{{ $model->id }}</td>
                            </tr>

                            <tr>
                                <td>{{ EventLog::getAttributeLabel('aggregate_id') }}</td>
                                <td>{{ $model->getAggregateName() }}</td>
                            </tr>

                            <tr>
                                <td>{{ EventLog::getAttributeLabel('event_id') }}</td>
                                <td>{{ $model->event_id }}</td>
                            </tr>

                            <tr>
                                <td>{{ EventLog::getAttributeLabel('version') }}</td>
                                <td>{{ $model->version }}</td>
                            </tr>

                            <tr>
                                <td>{{ EventLog::getAttributeLabel('shipped') }}</td>
                                <td>{!! $model->formatShippedHtml() !!}</td>
                            </tr>
                            <tr>
                                <td>{{ EventLog::getAttributeLabel('created_time') }}</td>
                                <td>{{ $model->created_time }}</td>
                            </tr>
                            <tr>
                                <td>{{ EventLog::getAttributeLabel('updated_time') }}</td>
                                <td>{{ $model->updated_time }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-md-4">

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td>{{ EventLog::getAttributeLabel('payload') }}</td>
                            </tr>
                            <tr>
                                <td>
                                    <pre class="m-0 p-0" style="color: #607d8b">{{ var_export($payload, true) }}</pre>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>


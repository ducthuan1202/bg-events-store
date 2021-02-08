<?php

namespace App\Http\Controllers;

use App\Models\EventLog;

class EventLogController extends Controller
{
    public function index()
    {
        $params = request()->all();

        $model = new EventLog();
        $data = $model->search($params);

        return view('event-log.index', [
            'title' => __('Events Logs List'),
            'data' => $data,
            'params' => $params,
        ]);
    }

    public function show($id)
    {
        $model = EventLog::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => view('event-log.show', [
                'model' => $model,
            ])->render(),
        ]);

    }
}

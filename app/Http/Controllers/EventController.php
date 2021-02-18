<?php

namespace App\Http\Controllers;

use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $params = request()->all();

        // dd(config('database.connections.mysql'));

        $model = new Event();
        $data = $model->search($params);

        return view('event.index', [
            'title' => __('Events List'),
            'data' => $data,
            'params' => $params,
        ]);
    }
}

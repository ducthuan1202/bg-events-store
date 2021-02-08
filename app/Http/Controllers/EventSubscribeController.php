<?php

namespace App\Http\Controllers;

use App\Models\EventSubscribe;

class EventSubscribeController extends Controller
{
    public function index()
    {
        $params = request()->all();

        $model = new EventSubscribe();
        $data = $model->search($params);

        return view('event-subscribe.index', [
            'title' => __('Events Subscribes List'),
            'data' => $data,
            'params' => $params,
        ]);
    }
}

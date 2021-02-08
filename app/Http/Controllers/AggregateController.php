<?php

namespace App\Http\Controllers;

use App\Models\Aggregate;

class AggregateController extends Controller
{
    public function index()
    {
        $params = request()->all();

        $model = new Aggregate();
        $data = $model->search($params);

        return view('aggregate.index', [
            'title' => __('Aggregates List'),
            'data' => $data,
            'params' => $params,
        ]);
    }
}

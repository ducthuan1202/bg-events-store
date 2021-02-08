<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AggregateController;
use App\Http\Controllers\EventLogController;
use App\Http\Controllers\EventSubscribeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', 'events', 301);
Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/aggregates', [AggregateController::class, 'index'])->name('aggregates.index');
Route::get('/events-logs', [EventLogController::class, 'index'])->name('events-logs.index');
Route::get('/events-logs/{id}', [EventLogController::class, 'show'])->name('events-logs.show');
Route::get('/events-subscribes', [EventSubscribeController::class, 'index'])->name('events-subscribes.index');

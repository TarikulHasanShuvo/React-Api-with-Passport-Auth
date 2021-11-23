<?php

use App\Events\TestEvent;
use Illuminate\Support\Facades\Route;
use Spatie\Activitylog\Models\Activity;

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

Route::get('/test', function () {
    return $activity = Activity::all();

});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/event', function () {
    event(new TestEvent("The Event is occurred"));
});

Route::view('/test-view','broadcast-test');

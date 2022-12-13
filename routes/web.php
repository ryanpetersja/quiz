<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;

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

Route::get('/', function () {
    return view('medquiz');
    return view("success");
});

Route::post('/quiz/respond',  function (Request $request) {
    // dd($request);
});

Route::post('/submit-quiz', function (Request $request) {
    dd($request);
});

Route::post('/submit-hair-quiz', [LeadController::class, 'store']);

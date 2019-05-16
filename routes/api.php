<?php

use Illuminate\Http\Request;
use App\Models\Employee;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['api']], function () {
    Route::resource('employees', 'EmployeeController')->except([
        'create', 'edit'
    ]);
    // Route::get('employees', function() {
    //     return Employee::all();
    // });
});

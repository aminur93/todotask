<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
    
    Route::get('task',function(){
        $data = \App\Task::get();
        return response()->json($data,200);
    });
    
    Route::post('task-create',function(Request $request){
        $data = \App\Task::create([
            'title' => $request->title,
            'status' => 0
        ]);
        return response()->json($data,200);
    });

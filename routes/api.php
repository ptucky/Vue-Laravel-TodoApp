<?php
Route::resource('tasks', 'TaskController', [
    'except' => ['create', 'edit', 'show']
]);

/*
// Original
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
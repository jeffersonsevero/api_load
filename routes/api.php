<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('users', function () {

    return User::query()->cursorPaginate(15);

});

Route::post('users', function (Request $request) {

    $user = User::create($request->all());

    return response()->json($user, 201);

});

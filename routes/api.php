<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('users', function () {

    return DB::table('users')
        ->select(['id', 'name', 'email'])
        ->orderBy('id')
        ->paginate(20);

});

Route::post('users', function (Request $request) {

    $user = User::create($request->all());

    return response()->json($user, 201);

});

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get("/posts", function (){
    $data = [
        "post_1" => [
            "title" => "title 1",
            "description" => "des 1",
            "pages" => 100,
        ],
        "post_2" => [
            "title" => "title 2",
            "description" => "des 2",
            "pages" => 53,
        ]
    ];
    return response()->json($data);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

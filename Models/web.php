<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Models\Comments;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect("/iftita-hamal");
});
Route::get('/comments', function () {
    $data = Comments::orderBy("id", "Desc")->get();
    return response($data);
});
Route::get('/{name}', function ($name) {
    return view('index');
});

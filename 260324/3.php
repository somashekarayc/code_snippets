<?php

use App\Enums\Category;

use Illuminate\Support\Facades\Route;

Route::get('/category/{category}', function (Category $category)
{
    return $category->value;
});
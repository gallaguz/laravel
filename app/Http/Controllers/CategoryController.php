<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        return view('news')->with('categories', Category::getCategories());
    }

    public function show($name) {
        return view('news')->with('news', News::getNewsByCategoryName($name));
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->select(['id', 'category', 'name'])
            ->get();
        return view('news.categories')->with('categories', $categories);
    }

    public function show($name)
    {
        $category = Category::query()
            ->where('name', $name)->firstOrFail();
        $news = Category::query()
            ->find($category->id)
            ->news()
            ->paginate(2);

        return view('news.category')->with('news', $news);
    }
}

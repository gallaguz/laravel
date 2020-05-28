<?php

namespace App\Http\Controllers;

use App\Category;
use App\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->select(['id', 'category', 'name'])->get();
        return view('news.categories')->with('categories', $categories);
    }

    public function show($name)
    {

        $category = Category::query()->select(['id', 'category'])->where('name', $name)->get();
        $news = News::query()
            ->where('category_id', $category[0]->id)
            ->get();

        ///dd(Category::query()->find(1)->news()->get());
        //  dd(News::query()->find(1)->category()->get());

        return view('news.category')->with('news', $news);
    }

}

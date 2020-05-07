<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        return view('news.index')->with('news', News::getNews());
    }

    public function show($id)
    {
        if (array_key_exists($id, News::getNews())) {
            return view('news.one')->with('news', News::getNewsId($id));
        } else {
            return redirect()->route('news.index');
        }

    }

}

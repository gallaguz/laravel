<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        //$news = News::all();

        $news = News::query()
            ->where('isPrivate', false)
            ->paginate(2);

        //$news->keyBy('id'); - для соответствия ключей

        return view('news.index')->with('news', $news);
    }

    public function show($id)
    {
        $news = News::query()->find($id);

        if (!empty($news)) {
            return view('news.One')->with('news', $news);
        } else {
            return redirect()->route('news.index');
        }

    }

}

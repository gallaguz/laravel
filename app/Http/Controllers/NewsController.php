<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    public function index()
    {
        // $news = DB::select('SELECT * FROM news');
        // $news = DB::table('news')->get();
        //$news = News::all();
        $news = News::query()
            ->where('isPrivate', false)
            ->paginate(5);



        return view('news.index')->with('news', $news);
    }

    public function show($id)
    {
        //$news = DB::select('SELECT * FROM news WHERE id = :id', ['id' => $id]);
        //$news = DB::table('news')->find($id);
        $news = News::query()->find($id);
        if (!empty($news)) {
            return view('news.One')->with('news', $news);
        } else {
            return redirect()->route('news.index');
        }

    }

}

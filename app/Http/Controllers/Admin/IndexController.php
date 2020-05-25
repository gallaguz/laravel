<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function json()
    {
        return response()->json(News::getNews())
            ->header('Content-Disposition', 'attachment; filename = "json.txt"')
            ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);


    }
    public function test() {
        return 'test';
    }
    public function downloadImage()
    {
        return 'lol';
        //return response()->download('img/069.jpeg');
    }
}

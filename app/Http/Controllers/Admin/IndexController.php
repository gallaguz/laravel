<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            $request->flash();
           /// File::put();
            return redirect()->route('admin.create');
        }
        return view('admin.create', [
            'categories' => Category::getCategories()
        ]);
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

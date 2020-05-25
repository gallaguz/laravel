<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index() {
        $news = News::query()
            ->paginate(5);

        return view('admin.index', ['news' => $news]);
    }

    public function create(Request $request)
    {
        if ($request->isMethod('post')) {
            //$request->flash();

            $url = null;

            if ($request->file('image')) {
                $path = Storage::putFile('public/images', $request->file('image'));
                $url = Storage::url($path);
            }


            $data = [
                'title' => $request->title,
                //'category_id' => $request->category,
                'text' => $request->text,
                'image' => $url,
                'isPrivate' => isset($request->isPrivate)
            ];


            DB::table('news')->insert($data);

            return redirect()->route('admin.index')->with('success', 'Новость успешно добавлена!');

        }

        return view('admin.create', [
            'categories' => []
        ]);
    }

    public function edit() {

    }
    public function destroy() {

    }

    public function update() {

    }
}


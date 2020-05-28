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
            ->paginate(2);

        return view('admin.index', ['news' => $news]);
    }

    public function create(Request $request)
    {
        $news = new News();

        if ($request->isMethod('post')) {
            //$request->flash();

            $url = null;

            if ($request->file('image')) {
                $path = Storage::putFile('public/images', $request->file('image'));
                $url = Storage::url($path);
                $news->image = $url;
            }

            $news->fill($request->all())->save();

            //DB::table('news')->insert($news);

            return view('admin.create', [
                'categories' => Category::query()->select(['id', 'category'])->get(),
                'news' => $news
            ]);
        }

        return view('admin.create', [
            'categories' => Category::query()->select(['id', 'category'])->get(),
            'news' => $news
        ]);
    }

    public function edit(Request $request, News $news) {
        return view('admin.create', [
            'news' => $news,
            'categories' => Category::query()->select(['id', 'category'])->get()
        ]);
    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.index')->with('success', 'Новость успешно удалена!');
    }

    public function update(Request $request, News $news) {
        if ($request->isMethod('post')) {
            if ($request->file('image')) {
                $path = Storage::putFile('public', $request->file('image'));
                $url = Storage::url($path);
                $news->image = $url;
            }
            $news->fill($request->all());
            $news->save();
            return redirect()->route('admin.index')->with('success', 'Новость успешно изменена!');
        }
    }
}


<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{

    public function index() {
        $news = News::query()
            ->paginate(2);

        return view('admin.index', ['news' => $news]);
    }

    public function create(News $news) {
        return view('admin.create', [
            'categories' => Category::query()->select(['id', 'category'])->get(),
            'news' => $news
        ]);
    }

    public function edit(News $news) {
        return view('admin.create', [
            'news' => $news,
            'categories' => Category::query()->select(['id', 'category'])->get()
        ]);
    }

    public function destroy(News $news) {
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость успешно удалена!');
    }

    public function update(Request $request, News $news)
    {
        $result = $this->saveData($request, $news);

        if ($result) {
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно изменена!');
        } else {
            $request->flash();
            return redirect()->route('admin.news.create')->with('error', 'Ошибка добавления новости!');
        }
    }

    public function store(Request $request)
    {
        $news = new News();

        $result = $this->saveData($request, $news);

        if ($result) {
            return redirect()->route('admin.news.index')->with('success', 'Новость успешно создана!');
        } else {
            $request->flash();
            return redirect()->route('admin.news.create')->with('error', 'Ошибка добавления новости!');
        }

    }


    // ext
    private function saveData(Request $request, News $news)
    {
        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
            $news->image = $url;
        }
        $this->validate($request, News::rules(), [], News::attributeNames());
        $news->fill($request->all());
        return $news->save();
    }
}

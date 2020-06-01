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
            ->paginate(5);

        return view('admin.index', ['news' => $news]);
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

        if ($request->file('image')) {
            $path = Storage::putFile('public', $request->file('image'));
            $url = Storage::url($path);
            $news->image = $url;
        }
        //dd($request);
        $news->fill($request->all());
        $result = $news->save();
        //dd($result);
        return redirect()->route('admin.index')->with('success', 'Новость успешно изменена!');

    }

    public function create(Request $request)
    {
        $news = new News();

        if ($request->isMethod('post')) {

            $url = null;
            if ($request->file('image')) {
                $path = Storage::putFile('public/images', $request->file('image'));
                $url = Storage::url($path);
            }

            $data = $this->validate($request, News::rules(), [], News::attributeNames());

            $result = $news->fill($data)->save();

            if ($result) {
                return redirect()->route('admin.index')->with('success', 'Новость успешно создана!');
            } else {
                $request->flash();
                return redirect()->route('admin.create')->with('error', 'Ошибка добавления новости!');
            }


        }

        return view('admin.create', [
            'categories' => Category::query()->select(['id', 'category'])->get(),
            'news' => $news
        ]);
    }
}

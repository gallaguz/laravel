<?php

namespace App;

class News
{
    private static $news = [
        1 => [
            'id' => 1,
            'title' => 'Новость Спорта 1',
            'text' => 'А у нас новость 1 и она очень хорошая!',
            'isPrivate' => true,
            'category_id' => 1
        ],
        2 => [
            'id' => 2,
            'title' => 'Новость Спорта 2',
            'text' => 'А у нас новость 2 и она очень хорошая!',
            'isPrivate' => false,
            'category_id' => 1
        ],
        3 => [
            'id' => 3,
            'title' => 'Новость Политики 1',
            'text' => 'А тут плохие новости(((',
            'isPrivate' => false,
            'category_id' => 2
        ],
        4 => [
            'id' => 4,
            'title' => 'Новость Политики 2',
            'text' => 'А тут плохие новости(((',
            'isPrivate' => false,
            'category_id' => 2
        ],

    ];

    public static function getNews() {
        //File::get();
        return static::$news;
    }

    public static function getNewsId($id)
    {
        return static::$news[$id];
    }

    public static function getNewsByCategoryName($name) {
        $id = Category::getCategoryIdByName($name);
        $news = [];
        foreach (static::$news as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }
}

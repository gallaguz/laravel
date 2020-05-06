<?php

namespace App;

class News
{
    private static $news = [
        1 => [
            'id' => 1,
            'title' => 'Новости спорта (1)',
            'text' => 'А у нас новость 1 и она очень хорошая!',
            'isPrivate' => true,
            'category_id' => 1
        ],
        2 => [
            'id' => 2,
            'title' => 'Новости спорта (2)',
            'text' => 'А тут плохие новости(((',
            'isPrivate' => false,
            'category_id' => 1
        ],
        3 => [
            'id' => 3,
            'title' => 'Новости политики (3)',
            'text' => 'А тут плохие новости(((',
            'isPrivate' => false,
            'category_id' => 2
        ],
        4 => [
            'id' => 4,
            'title' => 'Новости политики (4)',
            'text' => 'А тут плохие новости(((',
            'isPrivate' => false,
            'category_id' => 2
        ],
    ];

    public static function getNews() {
        return static::$news;
    }

    public static function getNewsId($id) {
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

<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;

use phpDocumentor\Reflection\Types\Static_;

class Category // extends Model
{
    private static $categories = [
        1 => [
            'id' => 1,
            'category' => 'Спорт',
            'name' => 'sport'
        ],
        2 => [
            'id' => 2,
            'category' => 'Политика',
            'name' => 'politics'
        ]
    ];

    public static function getCategories() {
        return static::$categories;
    }

    public static function getCategoryIdByName($name) {
        $id = null;
        foreach (static::$categories as $category) {
            if ($category['name'] == $name) {
                $id = $category['id'];
                break;
            }
        }
        return $id;
    }

    public static function getCategoryById($id) {
        return static::$categories[$id];
    }
}

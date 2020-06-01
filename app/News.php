<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    //public $timestamps = false;

    protected $fillable = ['title', 'text', 'isPrivate', 'category_id'];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }

    public static function attributeNames() {
        return [
            'title' => 'Название новости',
            'text' => 'Текст новости',
            'category_id' => "Категория новости",
            'image' => "Изображение",
            'isPrivate' => 'Приватность'
        ];
    }

    public static function rules() {
        $tableNameCategory = (new Category())->getTable();
        return [
            'title' => 'required|min:5|max:20',
            'text' => 'required',
            'category_id' => "required|exists:{$tableNameCategory},id",
            'images' => 'mimes:jpg,jpeg,bmp,png|max:1000',
            'isPrivate' => 'required|bool'
        ];
    }
}

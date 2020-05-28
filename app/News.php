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
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['title', 'name'];

    public function news() {
        return $this->hasMany(News::class, 'category_id');
    }
}

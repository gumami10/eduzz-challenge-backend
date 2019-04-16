<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {


    protected $fillable = [
        'author_id', 'title', 'category', 'content'
    ];

    public function author() {
        return $this->belongsTo('App\Author');
    }

    public function categories() {
        return $this->belongsToMany('App\Category', 'categories_posts', 'post_id', 'category_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model {

    protected $fillable = [
        'name', 'fav_category'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }
}

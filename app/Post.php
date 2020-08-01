<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'body']; // hanya title, slug, body yg bisa diisi

    // protected $guarded = []; // semua bisa di gunakan

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
}

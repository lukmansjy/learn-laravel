<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // protected $fillable = ['title', 'slug', 'body']; // hanya title, slug, body yg bisa diisi

    protected $guarded = []; // semua bisa di gunakan
}

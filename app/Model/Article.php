<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    public $table = "article";
    public $primaryKey = "article_id";
    public $guarded = [];
    public $timestamps = false;
}

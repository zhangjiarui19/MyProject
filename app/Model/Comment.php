<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $table = "comment";
    public $primaryKey = "comment_id";
    public $guarded = [];
    public $timestamps = false;
}

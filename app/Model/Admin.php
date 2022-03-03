<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    // 1.管理数据表
    public $table = 'admin';
    public $primaryKey = 'admin_id';
//    protected $fillable = [
//        'admin_name', 'admin_password',
//    ];
    public $guarded = [];
    public $timestamps = false;
}

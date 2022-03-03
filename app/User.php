<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // 1.用户模型关联表
    public $table = 'user';
    // 2.管理标的主键
    public $primaryKey = 'id';
    // 3.允许被操作的字段
    protected $fillable = [
        'user_name', 'user_password',
    ];

    // 禁用时间戳
    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

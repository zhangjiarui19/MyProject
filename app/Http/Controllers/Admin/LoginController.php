<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin;
use App\Model\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    //后台管理

    // 后台登录页
    public function login(){
        return view('admin.login');
    }

    // 表单验证
    public function doLogin(Request $request){
        // 1.接收数据
        $input = $request->except('_token');
//        dd($input);
        // 2.验证用户名 密码
        $user = Admin::where('admin_name', $input['username'])->first();
        if (!$user){
            return redirect('admin/login') -> with('errors', '用户名错误或未找到');
        }
        $password = Admin::where('admin_password', $input['password'])->first();
        if (!$password){
            return redirect('admin/login') -> with('errors', '密码错误');
        }
        // 3.保存用户信息到session
        session() -> put('admin', $user);
        // 4.跳转后台首页
        return redirect('admin/index');
    }

    public function index(){
        $article_list = Article::get();
        return view('admin.index', compact('article_list'));
    }

    public function logout(){
        // 清空session用户信息
        session()->flush();
        return redirect('admin/login');
    }

    public function doDel(Request $request){
        $input = $request->all();
        $article_id = $input['id'];
        $res = Article::find($article_id);
        $result = $res->delete();
        if ($result){
            return redirect('admin/index');
        }
    }
    public function info(Request $request){
        $input = $request->all();
//        dd($input);
        $article_id = $input['id'];
        $article = Article::where("article_id", $article_id)->first();
        return view('admin.info', compact('article'));
    }
}

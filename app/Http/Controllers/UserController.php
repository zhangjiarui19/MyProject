<?php

namespace App\Http\Controllers;

use App\Model\Article;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //添加方法
    public function add()
    {
        return view('user.add');
    }


    // 用户登录
    public function login()
    {
        return view('user.login');
    }

    // 用户首页
    public function index(Request $request)
    {
        // 1.获取用户数据
        $input = $request->all();
//        dd($input);
        if ($input){
//            where('field_name','like','%'.$keywords.'%')->get()
            if (Article::where('article_title', 'like', '%'.$input['query_text'].'%')->exists()){
                $article = Article::where('article_title', 'like', '%'.$input['query_text'].'%')->get();
            }else{
                return view('user.error');
            }
        }else{
            $article = Article::get();
            // 2.返回用户列表 compact传参
        }
        return view('user.index', compact('article'));
    }

    // 执行用户添加操作
    /***/
    public function store(Request $request)
    {
        // 1.获取表达数据
        $input = $request->except('_token');
//        dd($input);
        $user = $input['username'];
        $password = $input['password'];
        if (!$user) {
            return redirect('user/add')->with('errors', '请输入用户名');
        }
        if (!$password) {
            return redirect('user/add')->with('errors', '请输入密码');
        }
        // 2.添加操作
        User::create(['user_name' => $user, 'user_password' => $password]);
        $res = User::where('user_name', $input['username'])->first();
//        dd($res);
        // 3.判断 添加成功跳转到首页 失败 返回原界面
        if ($res) {
            session()->put('user', $res);
            return redirect('index');
        } else {
            return back();
        }

    }

    public function douserlog(Request $request)
    {
        $input = $request->except('_token');
        // dd($user);
        $user = User::where('user_name', $input['username'])->first();
        if (!$user) {
            return redirect('user/login')->with('errors', '用户名错误或未找到');
        }
        $password = User::where('user_password', $input['password'])->first();
        if (!$password) {
            return redirect('user/login')->with('errors', '密码错误');
        }
        // 3.保存用户信息到session
        session()->put('user', $user);
        // 4.跳转首页
//        return redirect()->route('/index', ['id'=>$input['username']]);
        return redirect('index');
//        return redirect()->action('App\Http\Controllers\HomeController@home',['id'=>17]);
    }

    // 用户退出
    public function logout(){
        session()->flush();
        return redirect('user/login');
    }
}

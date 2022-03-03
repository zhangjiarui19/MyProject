<?php

namespace App\Http\Controllers\Article;

use App\Model\Article;
use App\Model\Comment;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ArticleController extends Controller
{
    //
    public function add()
    {
        $input = Input::all();
        $id = $input['id'];
        return view('article.add', compact('id'));
    }

    public function doAdd(Request $request)
    {
        $input = $request->all();
        $username = $input['id'];
        $article_title = $input['title'];
        $article_content = $input['content'];
        $res = Article::create(['user_id' => $username, 'article_title' => $article_title, 'article_content' => $article_content]);
        if ($res) {
            return view('article.success');
        }
    }

    public function info(Request $request)
    {
        $input = $request->all();
        $article_id = $input['id'];
//        $user = User::where('user_name', $input['username'])->first();
        $result = Article::where('article_id', $article_id)->first();
//        dd($result->article_title);
        $comments = Comment::where('article_id', $article_id) -> get();
//        dd($comments);
        return view('article.info', compact('result', 'comments'));
    }

    // 添加评论
    public function addC(Request $request){
        $input = $request->all();
        $text = $input['text'];
        $article_id = $input['id'];
        //User::create(['user_name' => $user, 'user_password' => $password]);
        $res = Comment::create(['article_id'=>$article_id, 'content'=>$text]);
        if ($res){
            $info = [
                'status'=>'0',
                'msg'=>'添加成功',
            ];
        }else{
            $info = [
                'status'=>'1',
                'msg'=>'添加失败',
            ];
        }
        return $info;
    }
}

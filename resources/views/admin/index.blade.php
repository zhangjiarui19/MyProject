<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <style>
        *{
            padding: 0;
            margin: 0;
        }
        .top{
            position: absolute;
            top: 0;
            width: 100%;
            height: 50px;
            background-color: #000000;
        }
        .left{
            font-size: 20px;
            line-height: 50px;
            color: white;
            padding-left: 30px;
            display: inline-block;
        }
        .right{
            position: absolute;
            right: 30px;
            font-size: 15px;
            line-height: 50px;
            text-align: right;
            display: inline-block;
        }
        .right a{
            color: white;
            text-decoration: none;
        }
        .box{
            width: 1000px;
            margin: 0 auto;
            padding-top: 100px;
        }
        .box h1{
            margin-bottom: 20px;
        }
        #content{
            width: 400px;
        }
        #content .t_left{
            text-indent: 10px;
            height: 50px;
        }
        #content a{
            text-decoration: none;
            color:black;
        }
    </style>
</head>
<body>
<div class="top">
    <p class="left">后台管理</p>
    <p class="right">
        <a href="javascript:">admin</a>&nbsp;&nbsp;
        <a href="{{url('admin/logout')}}">退出登录</a>
    </p>
</div>
<div class="box">
    <h1>文章列表</h1>
    <table id="content">
        @foreach($article_list as $article)
        <tr>
            <td class="t_left"><h2><a href="{{url('admin/info')}}?id={{$article->article_id}}">{{$article->article_title}}</a></h2></td>
            <td><button><a href="{{url('admin/del')}}?id={{$article->article_id}}">删除</a></button></td>
        </tr>
        @endforeach
    </table>
</div>
</body>
</html>
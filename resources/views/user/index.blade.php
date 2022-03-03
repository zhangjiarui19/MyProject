<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>

    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .main{
            margin: 0 auto;
            height: 100%;
            width: 1200px;
            background-color: aqua;
        }

        .top{
            width: 100%;
            height: 100%;
            position: relative;
        }
        .logout{
            position: absolute;
            right: 0;
            top: 0;
        }
        .search{
            width: 100%;
            height: 10px;
            margin: 30px auto;
            padding-top: 30px;
            text-align: center;
            padding-bottom: 30px;
        }
        #text_input{
            width: 500px;
            height: 40px;
        }
        #btn_search{
            width: 70px;
            height: 40px;
        }

        .middle .messageList{
            width: 100%;
            height: auto;
            background-color: aquamarine;
            margin-top: 30px;
        }
        .messageList div{
            height: 100px;
            font-size: 30px;
            margin: 20px;
        }
        .messageList a{
            text-decoration: none;
            color: blue;
        }

    </style>
</head>
<body>

<div class="main">
    <div class="top">
        <div class="logout">
            <a href="javascript:">欢迎您：{{session('user')['user_name']}}</a>
            <a href="{{url('article/add')}}?id={{session('user')['user_id']}}">发布文章</a>
            <a href="{{url('user/logout')}}">退出登录</a>
        </div>
        <div class="search">
            <form method="get" action="{{url('index')}}">
                <label>
                    <input type="text" id="text_input" name="query_text">
{{--                    <button id="btn_search">搜索</button>--}}
                </label>
                <input type="submit" value="搜索" id="btn_search">
            </form>
        </div>
    </div>
    <div class="middle">
        <div class="messageList">
            @foreach($article as $art)
            <div class="info">
                <a href="{{url('article/info')}}?id={{$art->article_id}}"><p class="infoText">{{$art->article_title}}</p></a>
            </div>
            @endforeach
        </div>
    </div>
    <div class="bottom"></div>
</div>

</body>
</html>

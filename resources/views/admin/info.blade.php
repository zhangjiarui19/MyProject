<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章详情</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .box{
            margin: 30px auto;
            height: 100%;
            width: 1200px;
        }
        .content{
            padding-top: 50px;
            padding-bottom: 50px;
            font-size: 16px;
            text-indent: 30px;
            letter-spacing:3px;
        }
    </style>
</head>
<body>
<div class="box">
    <h1>{{$article->article_title}}</h1>
    <div class="content">{{$article->article_content}}</div>
</div>
</body>
</html>
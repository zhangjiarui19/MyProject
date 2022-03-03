<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>发布文章</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .box{
            font-size: 30px;
            margin: 100px 0 0 200px;
            width: 1000px;
            /*padding-left: 30px;*/
        }
        .title{
            height: 70px;
            width: 600px;
            font-size: 30px;
        }
        h2{
            margin: 20px 0;
        }
        .content{
            width: 600px;
            font-size: 30px;
        }
        .submit{
            width: 300px;
            height: 70px;
            font-size: 30px;
        }
        p input{
            margin-top: 40px;
            /*margin-left: 100px;*/
        }
    </style>
</head>
<body>
<div class="box">
    <form action="{{url('article/doadd')}}?id={{$id}}" method="post" id="form">
        {{csrf_field()}}
        <h2>文章标题：</h2>
        <input type="text" name="title" class="title">
        <h2>文章内容: </h2>
        <textarea name="content" id="" cols="30" rows="10" class="content" form="form"></textarea>
        <p><input type="submit" value="发布" class="submit"></p>
    </form>
</div>
</body>
</html>
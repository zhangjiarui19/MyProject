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
        #text{
            width: 500px;
            height: 100px;
        }
        #btn{
            width: 100px;
            height: 30px;
        }
        .comment h3{
            padding: 20px 0;
        }
        .comment .info{
            padding-bottom: 30px;
        }
    </style>
    <script src="{{asset('js/jquery-1.12.4.js')}}"></script>
    <script>
        $(function () {
            $('#btn').click(function (){
                // console.log('1');
                $.ajax({
                    type: 'post',
                    data: {
                        'text': $('#text').val(),
                        'id': {{$result->article_id}},
                        '_token': '{{csrf_token()}}'
                    },
                    url: '/article/addc',
                    success:function (res){
                        alert('添加成功！');
                        $('#infolist').append(
                            '<div class="info">'
                        + $('#text').val() +
                        '</div>'
                        );
                        // console.log(res);
                    },
                    error:function (error){
                        // console.log(error);
                        alert("添加失败");
                    }
                })
            })
        });
    </script>
</head>
<body>
<div class="box">
    <h1>{{$result->article_title}}</h1>
    <div class="content">{{$result->article_content}}</div>
    <div class="comment">
        <h3>发表评论</h3>
        <div class="post_comment">
{{--            <form action="{{url('article/addc')}}?id={{$result->article_id}}" method="post" id="textarea">--}}
                {{csrf_field()}}
                <textarea name="text" id="text" cols="30" rows="10" form="textarea"></textarea>
                <input type="submit" value="发表" id="btn">
{{--            </form>--}}
        </div>
        <h3>评论列表</h3>
        <div id="infolist">
            @foreach($comments as $comment)
            <div class="info">
                {{$comment->content}}
            </div>
            @endforeach
        </div>
    </div>
</div>
</body>
</html>
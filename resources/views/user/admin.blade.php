<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <style>
        div {
            font-size: 35px;
            width: 610px;
            height: 310px;
            margin: 100px auto 0;
        }

        table {
            width: 600px;
            height: 300px;
        }
        table input{
            height: 30px;
            width: 300px;
        }
        .left{
            width: 200px;
        }
        .login{
            font-size: 35px;
            width: 200px;
            height: 50px;
        }
    </style>
</head>
<body>
<div>
    <form action="" method="post"></form>
    <table>
        <tr>
            <td class="left">用户名:</td>
            <td><input type="text" name="admin_name"></td>
        </tr>
        <tr>
            <td class="left">密码 :</td>
            <td><input type="text" name="admin_password"></td>
        </tr>
    </table>
    <input type="submit" value="登录" class="login">
</div>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站后台管理系统</title>
</head>
<style>
body{font-family:"方正兰亭超细黑简体"; }
.log{width:285px; height:110px; margin:0 auto; padding-top:50px;}
*{ margin:0; padding:0; color:#000000; }
input{ outline:none;}
.button{ width:70px; font-size:16px; height:55px; float:left; border-radius:5px; border:0; }
.button:hover{ background:#FFF; }
.text-input{ width:140px; height:25px; line-height:25px; border:solid 1px #999; border-radius:5px; }
.login_txt{ width:210px; float:left;}
.admin_logo{ width:100%; font-size:36px; color:#FFF; text-align:center; }
.ysh_0552{ width: 100%; text-align: center; bottom:25px; position: absolute; }
</style>
<body>
<div style="width:100%; background:#333; padding-top:50px;top:25%; position:absolute; ">
<div class="admin_logo">FIRELY-英文版-网站后台</div>
	<div class="log" >
        <form action="<?php echo site_url('a_login/checkLogin'); ?>" method="post">
            <div class="login_txt">
                <label style="color:#FFF;">用户：</label>
                <input class="text-input" placeholder="请输入用户名" type="text" name="userName" />
            
                <label style="color:#FFF;">密码：</label>
                <input class="text-input" placeholder="请输入密码" type="password" name="userPwd" />
            </div>
                <input class="button" type="submit" value=" 登 录 " />
        </form>
    </div>
</div>

<div class="ysh_0552">
技术支持：QQ：339370290
</div>
</body>
</html>
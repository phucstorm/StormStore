<?php 
session_start();
require_once __DIR__. "/../libraries/database.php";
require_once __DIR__. "/../libraries/function.php";
$db = new Database;
$error = [];
$data = [
  'email' => postInput("email"),
  'password' => (postInput("password"))
];
if ($_SERVER["REQUEST_METHOD"]  == "POST") {
  if ($data['email'] == '') {
    $error['email'] = "Email không được trống";
  }  
  if ($data['password'] == '') {
    $error['password'] = "Password không được trống";
  }
  if (empty($error)) {
    $is_check = $db->fetchOne("admin"," email = '".$data['email']."' AND password = '".md5($data['password'])."' ");
    if ($is_check != NULL) {
      $_SESSION['admin_name'] = $is_check['name'];
      $_SESSION['admin_id'] = $is_check['id'];
      echo "<script>alert('Welcome back Big Boss ^.^'); location.href='/admin/'</script>";
    }else{
      echo "<script>alert('Bạn đã nhập sai email hoặc mật khẩu !');</script>";
    }
  }
}
?>
<head>
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script src="//code.jquery.com/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
  <title>Login - Admin</title>
<link rel="shortcut icon" href="/public/frontend/images/storm.ico" type="image/x-icon">
</head>
<style type="text/css">
@CHARSET "UTF-8";
.progress-bar {
  color: #333;
} 
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  outline: none;
}
.form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  @include box-sizing(border-box);

  &:focus {
    z-index: 2;
  }
}
body {
  background: url(/public/frontend/images/PROJECT2017_wp-9_1920x1080.jpg) no-repeat center center fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.login-form {
  margin-top: 60px;
  opacity: 0.75;
}
form[role=login] {
  color: #5d5d5d;
  background: #f2f2f2;
  padding: 26px;
  border-radius: 10px;
  -moz-border-radius: 10px;
  -webkit-border-radius: 10px;
}
form[role=login] img {
  display: block;
  margin: 0 auto;
  margin-bottom: 35px;
}
form[role=login] input,
form[role=login] button {
  font-size: 18px;
  margin: 16px 0;
}
form[role=login] > div {
  text-align: center;
}
.form-links {
  text-align: center;
  margin-top: 1em;
  margin-bottom: 50px;
}
.form-links a {
  color: #fff;
}
</style>
<div class="container">
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" action="#" role="login">
          <img src="/public/frontend/images/storm_logo1.png" class="img-responsive" alt="" style="border-radius: 20%;" />
          <input type="email" name="email" placeholder="Email" class="form-control input-lg" required autofocus="">
          <input type="password" class="form-control input-lg" name="password" placeholder="Password" required="" >
          <div class="pwstrength_viewport_progress"></div>
          <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Đăng nhập</button>
          <div>
            <a href="#" class="show">Tạo tài khoản mới</a>  <a href="#" class="show1">Quên mật khẩu</a>
          </div>
        </form>
        <div class="form-links">
          <a href="/">Trở về trang chủ</a>
        </div>
      </section>  
    </div>
  </div>
  <script language="javascript">  
    var a_list = document.getElementsByClassName("show");
    var b_list = document.getElementsByClassName("show1");
    for (var i = 0; i < 1; i++){
      a_list[i].onclick = function()
      {
        alert('Xin lỗi bạn, hiện tại admin chưa mở chức năng này cho bạn tạo tài khoản !!!');
        return false
      };
      b_list[i].onclick = function()
      {
        alert('Xin lỗi bạn, hiện tại chức năng này chưa được Unlock. Ráng mà chờ bản cập nhật tiếp theo nhé :) ');
        return false
      };
    }
  </script>

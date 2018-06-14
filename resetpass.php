<?php
$open = "users";
require_once __DIR__. "/autoload/autoload.php"; 
if ( ! isset($_SESSION['name_id'])) {echo "<script>alert('Bạn cần đăng nhập để thay đổi mật khẩu'); location.href='index.php'</script>";}
$EditUser = $db->fetchID("users",intval($_SESSION['name_id']));
if (empty($EditUser)) {
    $_SESSION['error'] = " dữ liệu khong có";
    echo "<script>alert('Bạn cần đăng nhập để thay đổi mật khẩu'); location.href='index.php'</script>";
}
$data = [
	'password' => postInput("password"),
	're_password' => postInput("re_password"),
];
$error = [];
if ($_SERVER["REQUEST_METHOD"]  == "POST") {
	if ($data['re_password'] == '') {
		$error['re_password'] = "Bạn phải nhập lại mật khẩu";
	}
	if ($data['password'] == '') {
		$error['password'] = "Password k được trống";
	}
	if ($data['password'] != $data['re_password']) {
		$error['re_password'] = "Nhập lại mật khẩu không đúng";
	}else{
		$data['password'] = MD5(postInput("password"));
	}
	if (empty($error)) {
		$idupdate = $db ->update("users",$data,array("id"=>intval($_SESSION['name_id'])));
		if ($idupdate > 0) {
			echo'<script language="javascript">alert("Thay đổi mật khẩu thành công!! Mời bạn đăng nhập lại");document.location.href="logout.php";</script>"';
		}else{
			echo "Thay đổi mật khẩu thất bại";
		}
	}
}
?>
<?php require_once __DIR__. "/layout/header.php"; ?>
<div class="col-md-9">
	<section class="box-main1">
		<h3 class="title-main"><a href="">Reset password</a> </h3>
		<form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px;">
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Mật khẩu mới</label>
				<div class="col-md-8">
					<input type="password" name="password" class="form-control" value="<?php echo $data['password'] ?>">
					<?php if (isset($error['password'])): ?>
						<p class="text-danger"><?php echo $error['password'] ?></p>
					<?php endif ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Nhập lại Mật khẩu</label>
				<div class="col-md-8">
					<input type="password" name="re_password" class="form-control" value="<?php echo $data['re_password'] ?>">
					<?php if (isset($error['re_password'])): ?>
						<p class="text-danger"><?php echo $error['re_password'] ?></p>
					<?php endif ?>
				</div>
			</div>
			<button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px;">Lưu</button>
		</form>
	</section>
</div>
<?php require_once __DIR__. "/layout/footer.php"; ?>             

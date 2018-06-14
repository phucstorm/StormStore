<?php 
require_once __DIR__. "/autoload/autoload.php";
if ( !isset($_SESSION['name_id'])) {
	echo "<script>alert('Bạn phải đăng nhập mới được dùng chức năng này'); location.href='index.php'</script>";
}
$user = $db->fetchID("users",intval($_SESSION['name_id']));

?>
<?php require_once __DIR__. "/layout/header.php"; ?>
<div class="col-md-9">
	<section class="box-main1">
		<h3 class="title-main"><a href="">Thông tin người dùng</a></h3>
		<form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px;">
		    <div class="form-group" align="center">
				<img src="/public/uploads/user-img/<?php echo $user['avatar'] ?>" width="40%" height="200px">
			</div>
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Tên thành viên</label>
				<div class="col-md-8">
					<input type="text" readonly="" name="name" class="form-control" value="<?php echo $user['name'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Email</label>
				<div class="col-md-8">
					<input type="email" readonly="" name="email" class="form-control" value="<?php echo $user['email'] ?>">	
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Số điện thoại</label>
				<div class="col-md-8">
					<input type="number" readonly="" name="phone" class="form-control" value="<?php echo $user['phone'] ?>">	
				</div>
			</div> 
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Địa chỉ</label>
				<div class="col-md-8">
					<input type="text" readonly="" name="address" class="form-control" value="<?php echo $user['address'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Created</label>
				<div class="col-md-8">
					<input type="text" readonly="" name="created" class="form-control" value="<?php echo $user['created_at'] ?>">	
				</div>
			</div>
			<div class="form-group" align="center">
				<a href="change-info.php" class="btn btn-success">Thay đổi thông tin</a>&nbsp;
				<a href="resetpass.php" class="btn btn-success">Thay đổi mật khẩu</a>	
			</div>
		</form>
	</section>
</div>
<?php require_once __DIR__. "/layout/footer.php"; ?>             

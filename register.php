<?php 
require_once __DIR__. "/autoload/autoload.php"; 
if (isset($_SESSION['name_id'])) {echo "<script>alert('Bạn đã có tài khoản nên không thể truy cập vào trang này'); location.href='index.php'</script>";}
$data = [
	'name' => postInput("name"),
	'email' => postInput("email"),
	'password' => postInput("password"),
	're_password' => postInput("re_password"),
	'address' => postInput("address"),
	'phone' => postInput("phone"),
];
$error = [];
if ($_SERVER["REQUEST_METHOD"]  == "POST") {
	if ($data['name'] == '') {
		$error['name'] = "Tên không được trống";
	}
	if ($data['email'] == '') {
		$error['email'] = "Email không được trống";
	}else{
		$is_check = $db->fetchOne("users"," email = '".$data['email']."'");
		if ($is_check != NULL) {
			$error['email'] = "Email đã được đăng ký bởi người dùng khác! Mời bạn nhập địa chỉ email khác";
		}
	}
	
	if ($data['phone'] == '') {
		$error['phone'] = "Phone không được trống";
	}
	if ($data['re_password'] == '') {
		$error['re_password'] = "Bạn phải nhập lại mật khẩu";
	}
	if ($data['password'] == '') {
		$error['password'] = "Password không được trống";
	}
	if ($data['password'] != $data['re_password']) {
		$error['re_password'] = "Nhập lại mật khẩu không đúng";
	}else{
		$data['password'] = MD5(postInput("password"));
	}
	if ($data['address'] == '') {
		$error['address'] = "Địa chỉ không được trống";
	}
	if ( ! isset($_FILES['avatar'])) {
        $error['avatar'] = "Mời bạn chọn hình ảnh";
    }
	if (empty($error)) {
	    if (isset($_FILES['avatar'])) {
            $file_name = $_FILES['avatar']['name'];
            $file_tmp = $_FILES['avatar']['tmp_name'];
            $file_type = $_FILES['avatar']['type'];
            $file_erro = $_FILES['avatar']['error'];
            if ($file_erro == 0) {
                $part = ROOT ."user-img/";
                $data['avatar'] = $file_name;
            }
        }
		$idinsert = $db -> insert("users",$data);
		if ($idinsert > 0) {
		    move_uploaded_file($file_tmp,$part.$file_name);
			$_SESSION['success'] = "Đăng ký thành công ! Mời bạn đăng nhập ";
			echo'<script language="javascript">document.location.href="login.php";</script>"';
		}else{
			echo "Đăng ký thất bại";
		}
	}
}
?>
<?php require_once __DIR__. "/layout/header.php"; ?>
<div class="col-md-9">
	<section class="box-main1">
		<h3 class="title-main"><a href="">Đăng ký thành viên</a> </h3>
		<form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px;"  enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Tên thành viên</label>
				<div class="col-md-8">
					<input type="text" name="name" placeholder="Storm" class="form-control" value="<?php echo $data['name'] ?>">
					<?php if (isset($error['name'])): ?>
						<p class="text-danger"><?php echo $error['name'] ?></p>
					<?php endif ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Email</label>
				<div class="col-md-8">
					<input type="email" name="email" placeholder="123@gmail.com" class="form-control" value="<?php echo $data['email'] ?>">
					<?php if (isset($error['email'])): ?>
						<p class="text-danger"><?php echo $error['email'] ?></p>
					<?php endif ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Mật khẩu</label>
				<div class="col-md-8">
					<input type="password" name="password" placeholder="**********" class="form-control" value="<?php echo $data['password'] ?>">
					<?php if (isset($error['password'])): ?>
						<p class="text-danger"><?php echo $error['password'] ?></p>
					<?php endif ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Nhập lại Mật khẩu</label>
				<div class="col-md-8">
					<input type="password" name="re_password" placeholder="**********" class="form-control" value="<?php echo $data['re_password'] ?>">
					<?php if (isset($error['re_password'])): ?>
						<p class="text-danger"><?php echo $error['re_password'] ?></p>
					<?php endif ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Số điện thoại</label>
				<div class="col-md-8">
					<input type="number" name="phone" placeholder="0123456789" class="form-control" value="<?php echo $data['phone'] ?>">
					<?php if (isset($error['phone'])): ?>
						<p class="text-danger"><?php echo $error['phone'] ?></p>
					<?php endif ?>
				</div>
			</div> 
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Địa chỉ</label>
				<div class="col-md-8">
					<input type="text" name="address" placeholder="45 Nguyễn Khắc Nhu, Cô Giang, Hồ Chí Minh" class="form-control" value="<?php echo $data['address'] ?>">
					<?php if (isset($error['address'])): ?>
						<p class="text-danger"><?php echo $error['address'] ?></p>
					<?php endif ?>
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Tải ảnh lên</label>
				<div class="col-md-8">
					<input type="file" name="avatar" class="form-control">
					<?php if (isset($error['avatar'])): ?>
						<p class="text-danger"><?php echo $error['avatar'] ?></p>
					<?php endif ?>
				</div>
			</div>
			<button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px;">Đăng ký</button>
		</form>
	</section>
</div>
<?php require_once __DIR__. "/layout/footer.php"; ?>             

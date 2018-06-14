<?php
$open = "users";
require_once __DIR__. "/autoload/autoload.php"; 
if ( ! isset($_SESSION['name_id'])) {echo "<script>alert('Bạn cần đăng nhập để thay đổi thông tin cá nhân'); location.href='index.php'</script>";}
$EditUser = $db->fetchID("users",intval($_SESSION['name_id']));
if (empty($EditUser)) {
    $_SESSION['error'] = " dữ liệu không có";
    echo "<script>alert('Bạn cần đăng nhập để thay đổi thông tin cá nhân'); location.href='index.php'</script>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "name" => postInput('name'),
        "phone" => postInput('phone'),
        "address" => postInput('address'),
    ];
    $error = [];
    // if ( ! isset($_FILES['thunbar'])) {
    //     $error['thunbar'] = "Mời bạn chọn hình ảnh";
    // }
    if (empty($error)) {
        if (isset($_FILES['thunbar'])) {
            $file_name = $_FILES['thunbar']['name'];
            $file_tmp = $_FILES['thunbar']['tmp_name'];
            $file_type = $_FILES['thunbar']['type'];
            $file_erro = $_FILES['thunbar']['error'];
            if ($file_erro == 0) {
                $part = ROOT ."user-img/";
                $data['thunbar'] = $file_name;
            }
        } 
        $update = $db->update("users",$data,array("id"=>$EditUser["id"]));
        if ($update > 0) {
            move_uploaded_file($file_tmp,$part.$file_name);
             echo "<script>alert('Cập nhật thành công');location.href='info-us.php'</script>";
        }else{
            echo "<script>alert('Cập nhật thất bại');location.href='info-us.php'</script>";
        }
    }
}
?>
<?php require_once __DIR__. "/layout/header.php"; ?>
<div class="col-md-9">
	<section class="box-main1">
		<h3 class="title-main"><a href="">Thay đổi thông tin</a> </h3>
		<form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px;" enctype="multipart/form-data">
			<div class="form-group" align="center">
				<img src="/public/uploads/user-img/<?php echo $EditUser['avatar'] ?>" width="200px" height="200px">
			</div>
			<!--<div class="form-group">-->
   <!--         <label for="inputEmail3" class="col-sm-3 control-label" style="font-size:15px;">Tải ảnh lên</label>-->
   <!--         <div class="col-sm-5">-->
   <!--             <input type="file" class="form-control" id="inputEmail3" name="thunbar">-->
   <!--             <?php if (isset($error['thunbar'])):?>-->
   <!--                 <p class="text-danger"> <?php echo $error['thunbar']?></p>-->
   <!--             <?php endif ?>-->
   <!--         </div>-->
   <!--         </div>-->
            <div class="form-group">
				<label class="col-md-2 col-md-offset-1">Tên thành viên</label>
				<div class="col-md-8">
					<input type="text" name="name" class="form-control" value="<?php echo $EditUser['name'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Số điện thoại</label>
				<div class="col-md-8">
					<input type="number" name="phone" class="form-control" value="<?php echo $EditUser['phone'] ?>">	
				</div>
			</div> 
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Địa chỉ</label>
				<div class="col-md-8">
					<input type="text" name="address" class="form-control" value="<?php echo $EditUser['address'] ?>">
				</div>
			</div>
			<button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px;">Lưu</button>
			
		</form>
	</section>
</div>
<?php require_once __DIR__. "/layout/footer.php"; ?>             
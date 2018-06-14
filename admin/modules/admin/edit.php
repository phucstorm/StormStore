<?php 
$open = "admin";
require_once __DIR__. "/../../autoload/autoload.php";
$id = intval(getInput('id'));
$Editadmin = $db->fetchID("admin",$id);
if (empty($Editadmin)) {
    $_SESSION['error'] = " dữ liệu không có";
    redirectAdmin("admin");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "name"      => postInput('name'),
        "email"     => postInput('email'),
        "phone"     => postInput('phone'),
        "address"   => postInput('address'),
        "level"     => postInput('level')
    ]; 
    $error = [];
    if (postInput('name') == '') {
        $error['name'] = " Mời bạn điền tên";
    }
    if (postInput('email') == '') {
        $error['email'] = " Mời bạn điền email";
    }
    else{
        if (postInput("email") != $Editadmin['email']) {
            $is_check = $db->fetchOne("admin","email = '".$data['email']."'");
            if ($is_check != NULL) {
                $error['email'] = "Email đã tồn tại";
            }
        }
    }
    if (postInput('phone') == '') {
        $error['phone'] = " Mời bạn nhập số điện thoại";
    }
    if (postInput('address') == '') {
        $error['address'] = " Mời bạn nhập địa chỉ";
    }
    if (postInput('password') != NULL && postInput("re_password") != NULL) {
        if (postInput('password') != postInput('re_password')) {
            $error['password'] = "Mật khẩu thay đổi không khớp";
        }else{
            $data['password'] = MD5(postInput("password"));
        }
    }
    if (empty($error)) {
        if (isset($_FILES['thunbar'])) {
            $file_name = $_FILES['thunbar']['name'];
            $file_tmp = $_FILES['thunbar']['tmp_name'];
            $file_type = $_FILES['thunbar']['type'];
            $file_erro = $_FILES['thunbar']['error'];
            if ($file_erro == 0) {
                $part = ROOT ."ad-img/";
                $data['thunbar'] = $file_name;
            }
        }
        $id_update = $db->update("admin",$data,array("id"=>$id));
        if ($id_update > 0) {
            move_uploaded_file($file_tmp,$part.$file_name);
            $_SESSION['success'] = " Cập nhật thành công";
            redirectAdmin("admin");
        }else{
            $_SESSION['error'] = " Cập nhật thất bại";
            redirectAdmin("admin");
        }
    }
}
?>
<?php require_once __DIR__. "/../../layout/header.php"; ?>
<div class="row"> 
    <div class="col-lg-12">    
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><a href="admin.php">Admin</a></li>
            <li class="breadcrumb-item">Sửa thông tin</a></li>
        </ol>
        <div class="clearfix"></div>
        <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
    </div>
</div>
<div class="row" style="padding-left: 15%">
    <div class="col-lg-12">
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Họ và tên</label>
                <div class="col-sm-6">
                 <input type="text" class="form-control" id="inputEmail3" name="name" value="<?php echo $Editadmin['name'] ?>">
                 <?php if (isset($error['name'])):?>
                    <p class="text-danger"> <?php echo $error['name']?></p>
                <?php endif ?>                            
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-6">
                <input type="email" class="form-control" id="inputEmail3" name="email" value="<?php echo $Editadmin['email'] ?>">
                <?php if (isset($error['email'])):?>
                    <p class="text-danger"> <?php echo $error['email']?></p>
                <?php endif ?>                            
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Điện thoại</label>
            <div class="col-sm-6">
                <input type="numer" class="form-control" id="inputEmail3" name="phone" value="<?php echo $Editadmin['phone'] ?>">
                <?php if (isset($error['phone'])):?>
                    <p class="text-danger"> <?php echo $error['phone']?></p>
                <?php endif ?>                            
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Hình ảnh</label>
            <div class="col-sm-6">
                <input type="file" class="form-control" id="inputEmail3" name="thunbar">
                <?php if (isset($error['thunbar'])):?>
                    <p class="text-danger"> <?php echo $error['thunbar']?></p>
                <?php endif ?>
                <img src="/public/uploads/ad-img/<?php echo $Editadmin['thunbar'] ?>" width="300px" height="200px">
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="inputEmail3" placeholder="*********" name="password" >
                <?php if (isset($error['password'])):?>
                    <p class="text-danger"> <?php echo $error['password']?></p>
                <?php endif ?>                            
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Confirm Password</label>
            <div class="col-sm-6">
                <input type="password" class="form-control" id="inputEmail3" placeholder="*********" name="re_password">
                <?php if (isset($error['re_password'])):?>
                    <p class="text-danger"> <?php echo $error['re_password']?></p>
                <?php endif ?>                            
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Địa chỉ</label>
            <div class="col-sm-6">
             <input type="text" class="form-control" id="inputEmail3" name="address" value="<?php echo $Editadmin['address'] ?>">
             <?php if (isset($error['address'])):?>
                <p class="text-danger"> <?php echo $error['address']?></p>
            <?php endif ?>                            
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Level</label>
        <div class="col-sm-6">
            <select class="form-control" name="level">
                <option value="1" <?php echo isset($Editadmin['level']) && $Editadmin['level'] == 1 ? "selected = 'selected'" : '' ?>>Customer</option>
                <option value="2" <?php echo isset($Editadmin['level']) && $Editadmin['level'] == 2 ? "selected = 'selected'" : '' ?>>Admin</option>
            </select>
            <?php if (isset($error['level'])):?>
                <p class="text-danger"> <?php echo $error['level']?></p>
            <?php endif ?>                            
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10 pull-right">
            <button type="submit" class="btn btn-primary"> Lưu </button>
        </div>
    </div>
</form>
</div>
</div>
<?php require_once __DIR__. "/../../layout/footer.php"; ?>
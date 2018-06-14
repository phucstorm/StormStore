<?php 
$open = "news";
require_once __DIR__. "/../../autoload/autoload.php";
$slide = $db->fetchAll("news");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [];
    $error = [];
    if (empty($error)) {
        if (isset($_FILES['thunbar'])) {
            $file_name = $_FILES['thunbar']['name'];
            $file_tmp = $_FILES['thunbar']['tmp_name'];
            $file_type = $_FILES['thunbar']['type'];
            $file_erro = $_FILES['thunbar']['error'];
            if ($file_erro == 0) {
                $part = ROOT_SLIDE ."slide/";
                $data['thunbar'] = $file_name;
            }
        }       
        $id_insert = $db->insert("news",$data);
        if ($id_insert) {
            move_uploaded_file($file_tmp,$part.$file_name);
            $_SESSION['success'] = " Thêm mới thành công";
            redirectAdmin("news");
        }else{
            $_SESSION['error'] = " Thêm mới thất bại";
            
        }
    }
}
?>
<?php require_once __DIR__. "/../../layout/header.php"; ?>              
<div class="row"> 
    <div class="col-lg-12">    
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin/">Dashboard</a>
            </li>
            <li class="breadcrumb-item active"><a href="index.php">Slide - IMG</a></li>
            <li class="breadcrumb-item">Thêm hình ảnh</a></li>
        </ol>
        <div class="clearfix"></div>
        <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
    </div>
</div>
<div class="row" style="padding-left: 25%">
    <div class="col-lg-12">
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Hình ảnh</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" id="inputEmail3" name="thunbar">
                <?php if (isset($error['thunbar'])):?>
                    <p class="text-danger"> <?php echo $error['thunbar']?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10 pull-right">
                <button type="submit" class="btn btn-primary"> Thực hiện </button>
            </div>
        </div>
    </form>
</div>
</div>
<?php require_once __DIR__. "/../../layout/footer.php"; ?>
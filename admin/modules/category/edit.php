<?php 
$open = "category";
require_once __DIR__. "/../../autoload/autoload.php";
$id = intval(getInput('id'));
$EditCategory = $db->fetchID("category",$id);
if (empty($EditCategory)) {
    $_SESSION['error'] = " dữ liệu không có";
    redirectAdmin("category");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = 
    [
        "name" => postInput('name'),
        "slug" => to_slug(postInput('name')),
    ];
    $error = [];
    if (postInput('name') == '') {
        $error['name'] = " Mời bạn điền tên danh mục";
    }
    if (postInput('slug') == '') {
        $error['slug'] = " Mời bạn điền thể loại";
    }
    if (empty($error)) {
        if ($EditCategory['name'] != $data['name']) {
            $isset = $db->fetchOne("category","name = '".$data['name']."'");
            if (count($isset) > 0) {
                $_SESSION['error'] = "tên danh mục đã có";
            }else{
                $id_update = $db->update("category",$data,array("id"=>$id));
                if ($id_update > 0) {
                    $_SESSION['success'] = "cập nhật thành công";
                    redirectAdmin("category");
                }else{
                    $_SESSION['error'] = "cập nhật thất bại";
                    redirectAdmin("category");
                }
            }
        }
    }else{
        $id_update = $db->update("category",$data,array("id"=>$id));
        if ($id_update > 0) {
            $_SESSION['success'] = "cập nhật thành công";
            redirectAdmin("category");
        }else{
            $_SESSION['error'] = "cập nhật thất bại";
            redirectAdmin("category");
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
            <li class="breadcrumb-item active"><a href="add.php">Danh mục</a></li>
            <li class="breadcrumb-item">Sửa tên danh mục</a></li>
        </ol>
        <div class="clearfix"></div>
        <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
    </div>
</div>
<div class="row" style="padding-left: 25%">
    <div class="col-md-12">
        <form class="form-horizontal" action="" method="POST">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Tên danh mục</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="inputEmail3" placeholder="Category" name="name" value="<?php echo $EditCategory['name'] ?>">
                    <?php if (isset($error['name'])):?>
                        <p class="text-danger"> <?php $error['name'];?></p>
                    <?php endif ?>                            
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10 pull-right">
                    <button type="submit" class="btn btn-primary">Lưu </button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php require_once __DIR__. "/../../layout/footer.php"; ?>
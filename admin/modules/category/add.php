<?php 
$open = "category";
require_once __DIR__. "/../../autoload/autoload.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = 
    [
        "name" => postInput('name'),
        "slug" => to_slug(postInput('name'))

    ];
    $error = [];
    if (postInput('name') == '') {
        $error['name'] = " Mời bạn điền tên danh mục";
    }
    if (empty($error)) {
        $isset = $db->fetchOne("category","name = '".$data['name']."'");
        if (count($isset) > 0) {
            $_SESSION['error'] = "tên danh mục đã có";
        }else{
            $id_insert = $db->insert("category",$data);
            if ($id_insert > 0) {
                $_SESSION['success'] = "Thêm thành công";
                redirectAdmin("category");
            }else{
                $_SESSION['error'] = "Thêm thất bại";
                redirectAdmin("category");
            }
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
            <li class="breadcrumb-item">Thêm danh mục</a></li>
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
                    <input type="text" class="form-control" id="inputEmail3" name="name">
                    <?php if (isset($error['name'])):?>
                        <p class="text-danger"> <?php echo $error['name']?></p>
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
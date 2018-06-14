<?php 
$open = "product";
require_once __DIR__. "/../../autoload/autoload.php";
$category = $db->fetchAll("category");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = 
    [
        "name" => postInput('name'),
        "slug" => to_slug(postInput('name')),
        "category_id" => postInput('category_id'),
        "price" => postInput('price'),
        "number" => postInput('number'),
        "content" => postInput('content')
    ];
    $error = [];
    if (postInput('name') == '') {
        $error['name'] = " Mời bạn điền tên sản phẩm";
    }
    if (postInput('category_id') == '') {
        $error['category_id'] = " Mời bạn chọn tên danh mục";
    }
    if (postInput('price') == '') {
        $error['price'] = " Mời bạn nhập giá sản phẩm";
    }
    if (postInput('number') == '') {
        $error['number'] = " Mời bạn nhập số lượng sản phẩm";
    }
    if (postInput('content') == '') {
        $error['content'] = " Mời bạn nhập nội dung sản phẩm";
    }
    if ( ! isset($_FILES['thunbar'])) {
        $error['thunbar'] = "Mời bạn chọn hình ảnh";
    }
    if (empty($error)) {
        if (isset($_FILES['thunbar'])) {
            $file_name = $_FILES['thunbar']['name'];
            $file_tmp = $_FILES['thunbar']['tmp_name'];
            $file_type = $_FILES['thunbar']['type'];
            $file_erro = $_FILES['thunbar']['error'];
            if ($file_erro == 0) {
                $part = ROOT ."product/";
                $data['thunbar'] = $file_name;
            }
        }       
        $id_insert = $db->insert("product",$data);
        if ($id_insert) {
            move_uploaded_file($file_tmp,$part.$file_name);
            $_SESSION['success'] = " Thêm mới thành công";
            redirectAdmin("product");
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
            <li class="breadcrumb-item active"><a href="index.php">Sản phẩm</a></li>
            <li class="breadcrumb-item">Thêm sản phẩm mới</a></li>
        </ol>
        <div class="clearfix"></div>
        <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
    </div>
</div>
<div class="row" style="padding-left: 25%">
    <div class="col-lg-12">
        <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Danh mục sản phẩm</label>
                <div class="col-sm-6">
                    <select class="form-control col-md-12" name="category_id">
                        <option value=""> - Mời bạn chọn danh mục sản phẩm</option>
                        <?php foreach ($category as $item): ?>
                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <?php if (isset($error['category_id'])):?>
                        <p class="text-danger"> <?php echo $error['category_id']?></p>
                    <?php endif ?>                            
                </div>
            </div>                
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-3 control-label">Tên sản phẩm</label>
                <div class="col-sm-6">
                   <input type="text" class="form-control" id="inputEmail3" placeholder="tên sản phẩm" name="name">
                   <?php if (isset($error['name'])):?>
                    <p class="text-danger"> <?php echo $error['name']?></p>
                <?php endif ?>                            
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Giá sản phẩm</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" id="inputEmail3" placeholder="10.000.000" name="price">
                <?php if (isset($error['price'])):?>
                    <p class="text-danger"> <?php echo $error['price']?></p>
                <?php endif ?>                            
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-3 control-label">Số lượng sản phẩm</label>
            <div class="col-sm-6">
                <input type="number" class="form-control" id="inputEmail3" placeholder="100" name="number">
                <?php if (isset($error['number'])):?>
                    <p class="text-danger"> <?php echo $error['number']?></p>
                <?php endif ?>                            
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Giảm giá</label>
            <div class="col-sm-3">
                <input type="number" class="form-control" id="inputEmail3" placeholder="20%" name="sale" value="0">
            </div>
            <label for="inputEmail3" class="col-sm-3 control-label">Hình ảnh</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" id="inputEmail3" name="thunbar">
                <?php if (isset($error['thunbar'])):?>
                    <p class="text-danger"> <?php echo $error['thunbar']?></p>
                <?php endif ?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-smn3 control-label">Nội dung</label>
            <div class="col-sm-6">
                <textarea class="form-control" name="content" rows="4"></textarea>
                <?php if (isset($error['content'])):?>
                    <p class="text-danger"> <?php echo $error['content']?></p>
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
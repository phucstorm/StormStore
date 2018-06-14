<?php 
$open = "news";
require_once __DIR__. "/../../autoload/autoload.php";
$id = intval(getInput('id'));
$EditSlide = $db->fetchID("news",$id);
if (empty($EditSlide)) {
    $_SESSION['error'] = " dữ liệu không có";
    redirectAdmin("news");
}
    $num = $db->delete("news",$id);
    if($num > 0){
        $_SESSION['success'] = " Xóa thành công";
        redirectAdmin("news");
    }else{
        $_SESSION['error'] = " Xóa thất bại";
        redirectAdmin("news");
    }

?>
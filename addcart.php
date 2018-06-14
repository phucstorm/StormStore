<?php require_once __DIR__. "/autoload/autoload.php"; 
if ( !isset($_SESSION['name_id'])) {
	echo "<script>alert('Bạn phải đăng nhập mới được dùng chức năng này'); location.href='login.php'</script>";
}
$id = intval(getInput('id'));
$product = $db->fetchID("product",$id);
if (!isset($_SESSION['cart'][$id])) {
	$_SESSION['cart'][$id]['name'] = $product['name'];
	$_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
	$_SESSION['cart'][$id]['sl'] = 1;
	$_SESSION['cart'][$id]['price'] = ((100 - $product['sale']) * $product['price'])/100;
}else{
	$_SESSION['cart'][$id]['sl'] += 1;
}echo "<script>alert('Sản phẩm đã vào giỏ hàng của bạn'); location.href='cart.php'</script>";
?>
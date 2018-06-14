<?php require_once __DIR__. "/autoload/autoload.php"; 
$sum =0;
if ( !isset($_SESSION['name_id'])) {
	echo "<script>alert('Bạn phải đăng nhập mới được dùng chức năng này'); location.href='login.php'</script>";
}
if(! isset($_SESSION['cart']) || count($_SESSION['cart']) == 0){
	echo "<script>alert('Không có sản phẩm nào trong giỏ hàng !! Bạn sẽ bị đẩy về trang chủ'); location.href='index.php'</script>";
}
?>
<?php require_once __DIR__. "/layout/header.php"; ?>
<div class="col-md-9">
	<section class="box-main1">
		<h3 class="title-main"><a href="">Giỏ hàng của bạn</a> </h3>
		<?php if (isset($_SESSION['success'])): ?>
			<div class="alert alert-success">
				<strong style="color: #3c763d">Success !</strong> <?php echo $_SESSION['success']; unset($_SESSION['success']) ?>
			</div>
		<?php endif ?>
		<table class="table table-hover" id="cart-info">
			<thead>
				<tr>
					<th>STT</th><th>Tên sản phẩm</th><th>Hình ảnh</th><th>Số lượng</th><th>Giá</th><th>Tổng tiền</th><th>Thao tác</th>
				</tr>
			</thead>
			<tbody id="tbody">
				<?php $stt =1;foreach ($_SESSION['cart'] as $key => $value): ?>
				<tr>
					<td><?php echo $stt ?></td>
					<td><?php echo $value['name'] ?></td>
					<td><img src="public/uploads/product/<?php echo $value['thunbar'] ?>" width="80px" height="80px"></td>
					<td><input type="number" name="sl" value="<?php echo $value['sl'] ?>" class="form-control" id="sl" min="0"></td>
					<td><?php echo formatPrice($value['price']) ?></td>
					<td><?php echo formatPrice($value['price'] * $value['sl']) ?></td>
					<td><a href="remove.php?key=<?php echo $key ?>" class="btn btn-xs btn-danger"> <i class="fa fa-remove"></i></a><a href="" class="btn btn-xs btn-info updatecart" data-key=<?php echo $key ?>> <i class="fa fa-refresh"></i></a></td>
				</tr>
				<?php $sum+= $value['price'] * $value['sl']; $_SESSION['tongtien'] = $sum;?><?php $stt ++;endforeach ?>
			</tbody>
		</table>
		<div class="col-md-5 pull-right">
			<ul class="list-group">
				<li class="list-group-item"><h3>Thông tin đơn hàng</h3></li>
				<li class="list-group-item"><span class="badge"><?php echo formatPrice($_SESSION['tongtien']) ?></span>Số tiền</li>
				<li class="list-group-item"><span class="badge"> 10% </span>Thuế VAT</li>
				<li class="list-group-item"><span class="badge"><?php echo sale($_SESSION['tongtien']) ?> % </span> Giảm giá</li>
				<li class="list-group-item"><span class="badge"><?php $_SESSION['total'] = $_SESSION['tongtien'] * 110/100; echo formatPrice($_SESSION['total']) ?></span> Tổng tiền thanh toán</li>
				<li class="list-group-item"><a href="index.php" class="btn btn-success">Tiếp tục mua hàng</a><a href="thanhtoan.php" class="btn btn-success pull-right">Thanh toán</a></li>
			</ul>
		</div>
	</section>
</div>
<?php require_once __DIR__. "/layout/footer.php"; ?>             

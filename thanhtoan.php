<?php 
require_once __DIR__. "/autoload/autoload.php";
$user = $db->fetchID("users",intval($_SESSION['name_id']));
if ($_SERVER["REQUEST_METHOD"]  == "POST") {
	$data = [
		'amount' => $_SESSION['total'],
		'users_id' => $_SESSION['name_id'],
		'note' => postInput("note")
	];
	$idtran = $db-> insert("transaction",$data);
	if ($idtran > 0) {
		foreach($_SESSION['cart'] as $key => $value){
			$data2 = [
				'transaction_id' => $idtran,
				'product_id' => $key,
				'sl' => $value['sl'],
				'price' => $value['price']
			]; 
			$id_insert = $db->insert("orders",$data2); 
		}
		unset($_SESSION['cart']);
		unset($_SESSION['total']);
		$_SESSION['success'] = "Lưu thông tin đơn hàng thành công! Storm store sẽ liên hệ với bạn sớm nhất ^.^";
		echo'<script language="javascript">document.location.href="thongbao.php";</script>"';
	}
}
?>
<?php require_once __DIR__. "/layout/header.php"; ?>
<div class="col-md-9">
	<section class="box-main1">
		<h3 class="title-main"><a href="">Thanh toán đơn hàng</a> </h3>
		<form action="" method="POST" class="form-horizontal formcustome" role="form" style="margin-top: 20px;">
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Tên thành viên</label>
				<div class="col-md-8">
					<input type="text" readonly="" name="name" placeholder="Storm" class="form-control" value="<?php echo $user['name'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Email</label>
				<div class="col-md-8">
					<input type="email" readonly="" name="email" placeholder="123@gmail.com" class="form-control" value="<?php echo $user['email'] ?>">	
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Số điện thoại</label>
				<div class="col-md-8">
					<input type="number" readonly="" name="phone" placeholder="0123456789" class="form-control" value="<?php echo $user['phone'] ?>">	
				</div>
			</div> 
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Địa chỉ</label>
				<div class="col-md-8">
					<input type="text" readonly="" name="address" placeholder="45 Nguyễn Khắc Nhu, Cô Giang, Hồ Chí Minh" class="form-control" value="<?php echo $user['address'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Số tiền</label>
				<div class="col-md-8">
					<input type="text" readonly="" name="total" class="form-control" value="<?php echo formatPrice($_SESSION['total']) ?>">	
				</div>
			</div>
			<div class="form-group">
				<label class="col-md-2 col-md-offset-1">Ghi chú</label>
				<div class="col-md-8">
					<input type="text" name="note"  class="form-control">	
				</div>
			</div>
			<button type="submit" class="btn btn-success col-md-2 col-md-offset-5" style="margin-bottom: 20px;">Xác nhận</button>
		</form>
	</section>
</div>
<?php require_once __DIR__. "/layout/footer.php"; ?>             

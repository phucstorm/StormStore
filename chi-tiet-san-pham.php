<?php require_once __DIR__. "/autoload/autoload.php"; $id = intval(getInput('id'));$product = $db->fetchID("product",$id);$cateid = intval($product['category_id']);
$sql = "SELECT * FROM product WHERE category_id = $cateid ORDER BY rand() LIMIT 4";
$spkemtheo = $db -> fetchsql($sql);
?>
<?php require_once __DIR__. "/layout/header.php"; ?>
<div class="col-md-9">
	<section class="box-main1" >
		<div class="col-md-6 text-center">
			<img src="public/uploads/product/<?php echo $product['thunbar'] ?>" class="img-responsive bor" id="imgmain" width="100%" height="370" >
		</div>
		<div class="col-md-6" style="margin-top: 20px;padding: 30px;">
			<ul id="right">
				<li><h3><?php echo $product['name'] ?></h3></li>
				<?php if ($product['sale'] >0): ?>
					<li><b class="price" style="font-size:20px;">Giá: </b><strike class="sale"><?php echo formatPrice($product['price']) ?></strike></li>
					<li> <b class="price" style="font-size:20px;">Còn lại: <?php echo formatpricesale($product['price'],$product['sale']) ?></b></li>
				<?php else: ?>
					<li><b class="price" style="font-size:20px;">Giá: <?php echo formatPrice($product['price']) ?></b></li>
				<?php endif ?>
				<li><a href="addcart.php?id=<?php echo $product['id'] ?>" class="btn btn-default"> <i class="fa fa-shopping-basket"></i>Thêm vào giỏ hàng</a></li>
			</ul>
		</div>
	</section>
	<div class="col-md-12" id="tabdetail">
		<div class="row">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#home">Mô tả sản phẩm </a></li>
				<li><a data-toggle="tab" href="#menu1">Sản phẩm liên quan </a></li>	
			</ul>
			<div class="tab-content">
				<div id="home" class="tab-pane fade in active">
					<h3>Chi tiết và thông tin sản phẩm</h3><br>
					<p style="font-size:15px;"><?php echo $product['content'] ?></p>
				</div>
				<div id="menu1" class="tab-pane fade">
					<h3> Sản phẩm liên quan </h3>
					<div class="showitem" style="margin-top: 10px; margin-bottom: 10px;">
						<?php foreach ($spkemtheo as $item): ?>
							<div class="col-md-3 item-product bor">
								<a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
									<img src="public/uploads/product/<?php echo $item['thunbar'] ?>" class="" width="180px" height="150px">
								</a>
								<div class="info-item">
									<a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
								</div>
								
									<?php if ($item['sale'] >0): ?>
									<div class="info-item">
										<b class="price" style="font-size:15px;">Giá: </b><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> 
									</div>
									<div class="info-item">
									    <b class="price" style="font-size:15px;">Còn lại: <?php echo formatpricesale($item['price'],$item['sale']) ?></b>
									</div>
									<?php else: ?>
									<div class="info-item">
										<b class="price" style="font-size:15px;">Giá: <?php echo formatPrice($item['price']) ?></b>
									</div>
									<?php endif ?>
								
								<div class="hidenitem">
									<p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
									<p><a href=""><i class="fa fa-heart"></i></a></p>
									<p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
								</div>
							</div>
						<?php endforeach ?>
					</div>
				</div>
			</div>
		</div>
	</div>		
</div>
<?php require_once __DIR__. "/layout/footer.php"; ?> 
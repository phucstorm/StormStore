<?php 
require_once __DIR__. "/autoload/autoload.php"; 
if ($_SERVER["REQUEST_METHOD"] == "GET") {
	$search = addslashes($_GET['keywork']);
	if (empty($search)) {
		return'<script language="javascript">document.location.href="index.php";</script>"';
	} 
	else{
		$sqlS = "SELECT * FROM product WHERE name LIKE '%$search%'";
		$found = $db->fetchsql($sqlS);
	}
}
?>
<?php require_once __DIR__. "/layout/header.php"; ?>
<div class="col-md-9">
  <section class="box-main1">
   <h3 class="title-main"><a href="">Kết quả tìm kiếm</a> </h3><br>
   &nbsp;
   <?php if($found != NULL):?>
   <?php foreach ($found as $item): ?>
    <div class="col-md-3 item-product">
      <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
        <img src="/public/uploads/product/<?php echo $item['thunbar'] ?>" class="" width="180px" height="150px">
      </a>
      <div class="info-item">
        <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
      </div>
      <?php if ($item['sale'] >0): ?>
		<div class="info-item">
		    <b class="price">Giá: </b><strike class="sale"><?php echo formatPrice($item['price']) ?></strike> 
		</div>
		<div class="info-item">
		    <b class="price">Còn lại: <?php echo formatpricesale($item['price'],$item['sale']) ?></b>
		</div>
		<?php else: ?>
		<div class="info-item">
		    <b class="price">Giá: <?php echo formatPrice($item['price']) ?></b>
		</div>
		<?php endif ?>
      <div class="hidenitem">
        <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
        <p><a href=""><i class="fa fa-heart"></i></a></p>
        <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
      </div>
    </div>
  <?php endforeach ?>
  <?php else:?>
    <h3 style="text-align: center"> Không tìm thấy sản phẩm </h3>
  <?php endif?>
</div>
</section>
</div>
<?php require_once __DIR__. "/layout/footer.php"; ?>             




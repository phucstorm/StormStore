<?php require_once __DIR__. "/autoload/autoload.php"; 
$sqlHomecate = "SELECT name, id FROM category WHERE home = 1 ORDER BY updated_at ";
$CategoryHome = $db->fetchsql($sqlHomecate);
$data=[];
foreach($CategoryHome as $item){
  $cateId = intval($item['id']);
  $sql = "SELECT * FROM product WHERE category_id = $cateId LIMIT 4";
  $ProductHome = $db->fetchsql($sql);
  $data[$item['name']] = $ProductHome;
}
?>
<?php require_once __DIR__. "/layout/header.php"; ?>
<div class="col-md-9">
  <section id="slide" class="text-center" >    
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
        <li data-target="#myCarousel" data-slide-to="4"></li>
        <li data-target="#myCarousel" data-slide-to="5"></li>
      </ol>
      <div class="carousel-inner">
        <div class="item active">
          <img src="public/frontend/images/slide/244_image.jpg" alt="" style="width:100%; height: 300px;">
        </div>
        <div class="item">
          <img src="public/frontend/images/slide/262_image.jpg" alt="" style="width:100%;height: 300px;">
        </div>
        <div class="item">
          <img src="public/frontend/images/slide/270_image.jpg" alt="" style="width:100%;height: 300px;">
        </div>
        <div class="item">
          <img src="public/frontend/images/slide/274_image.jpg" alt="" style="width:100%;height: 300px;">
        </div>
        <div class="item">
          <img src="public/frontend/images/slide/280_image.jpg" alt="" style="width:100%;height: 300px;">
        </div>
        <div class="item">
          <img src="public/frontend/images/slide/51_image.jpg" alt="" style="width:100%;height: 300px;">
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span><span class="sr-only"></span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span><span class="sr-only"></span>
      </a>
    </div>
  </section>
  <p>&nbsp;</p>
  <section class="box-main1">
    <?php foreach ($data as $key => $value): ?>
      <h3 class="title-main"><a href=""><?php echo $key ?></a> </h3>
      <div class="showitem" style="margin-top: 10px; margin-bottom: 10px;">
        <?php foreach ($value as $item): ?>
          <div class="col-md-3 item-product">
            <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
              <img src="public/uploads/product/<?php echo $item['thunbar'] ?>" class="" width="180px" height="150px">
            </a>
            <div class="info-item">
              <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a>
            </div>
            
            <?php if ($item['sale'] > 0): ?>
            <div class="info-item">
              Giá:<strike class="sale" style="font-size:15px;"> <?php echo formatPrice($item['price']) ?></strike>
            </div>
            <div class="info-item">
              <b class="price" style="font-size:15px;">Giảm giá: <?php echo formatpricesale($item['price'],$item['sale']) ?></b>
            </div>
            <?php else: ?>
            <div class="info-item">
              <b class="price" style="font-size:15px;">Giá: <?php echo formatPrice($item['price']) ?></b>
            </div>
            <?php endif; ?>
            <div class="hidenitem">
              <p><a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>"><i class="fa fa-search"></i></a></p>
              <p><a href=""><i class="fa fa-heart"></i></a></p>
              <p><a href="addcart.php?id=<?php echo $item['id'] ?>"><i class="fa fa-shopping-basket"></i></a></p>
            </div>
          </div>
        <?php endforeach ?>
      </div>
    <?php endforeach ?>
  </section>
</div>
<?php require_once __DIR__. "/layout/footer.php"; ?>             

<!DOCTYPE html>
<html>
<head>
    <title>Storm Store - T163806</title>
    <link rel="shortcut icon" href="public/frontend/images/storm.ico" type="image/x-icon">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="public/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="public/frontend/css/bootstrap.min.css">
    <script  src="public/frontend/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script  src="public/frontend/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="public/frontend/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="public/frontend/css/slick-theme.css"/>
    <link rel="stylesheet" type="text/css" href="public/frontend/css/style.css">
</head>
<body>
    <div id="wrapper">
        <div id="header">
            <div id="header-top">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-6" id="header-text">
                            <a href="login/"><i class="fa fa-lg fa-home">Storm</i></a>
                        </div>
                        <div class="col-md-6">
                            <nav id="header-nav-top">
                                <ul class="list-inline pull-right" id="headermenu">
                                    <?php if (isset($_SESSION['name_user'])): ?>
                                        <li style="color: red"><i class="fa fa-user" style="color: red"></i> Hello <?php echo $_SESSION['name_user'] ?></li>
                                        <li>
                                            <a href="#"><i class="fa fa-user"></i> Thông tin cá nhân <i class="fa fa-caret-down"></i></a>
                                            <ul id="header-submenu" style="text-align: center">
                                                <li><a href="info-us.php"><i class="fa fa-address-card-o"></i> Hồ sơ </a></li>
                                                <li><a href="cart.php"><i class="fa fa-shopping-basket"></i> Giỏ hàng </a></li>
                                                <li><a href="logout.php"><i class="fa fa-share-square-o"></i> Đăng xuất </a></li>
                                            </ul>
                                        </li>
                                    <?php else: ?>
                                        <li>
                                            <a href="login.php"><i class="fa fa-unlock"></i> Đăng nhập</a>
                                        </li>
                                        <li>
                                            <a href="register.php"><i class="fa fa-user"></i> Đăng ký</a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row" id="header-main">
                    <div class="col-md-5">
                        <form class="form-inline" method="GET" action="result.php">
                            <div class="form-group">
                                <label>
                                    <select name="category" class="form-control">
                                        <option> Tất cả sản phẩm </option>
                                    </select>
                                </label>
                                <input type="text" name="keywork" placeholder="Search" class="form-control">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-4">
                        <a href="/">
                            <img src="public/frontend/images/storm_logo1.png" height="60px" width="200px">
                        </a>
                    </div>
                    <div class="col-md-3" id="header-right">
                        <div class="pull-right">
                            <div class="pull-left">
                                <i class="glyphicon glyphicon-phone-alt"></i>
                            </div>
                            <div class="pull-right">
                                <p id="hotline">HOTLINE</p>
                                <p>0935943415</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="menunav">
            <div class="container">
                <nav>
                    <div class="home pull-left">
                        <a href="index.php">Trang chủ</a>
                    </div>
                    <ul id="menu-main">
                        <li>
                            <a href="about.php">Về chúng tôi</a>
                        </li>
                        <li>
                            <a href="contact.php">Liên hệ</a>
                        </li>
                    </ul>
                    <ul class="pull-right" id="main-shopping">
                        <li>
                            <a href="cart.php"><i class="fa fa-shopping-basket"></i> Giỏ hàng </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <div id="maincontent">
            <div class="container">
                <div class="col-md-3  fixside" >
                    <div class="box-left box-menu" >
                        <h3 class="box-title"><i class="fa fa-list"></i>  Danh mục</h3>
                        <ul> 
                            <?php foreach($category as $item): ?>
                                <li><a href="danh-muc-san-pham.php?id=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></li>
                            <?php  endforeach; ?>
                        </ul>
                    </div>
                    <div class="box-left box-menu">
                        <h3 class="box-title"><i class="fa fa-fire"></i>  Sản phẩm mới </h3>
                        <ul>
                            <?php foreach($productNew as $item): ?>
                                <li class="clearfix">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                        <img src="public/uploads/product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $item['name'] ?></p >
                                            
                                            <?php if($item['sale'] > 0): ?>
                                            <b class="price">Giảm giá: <?php echo formatpricesale($item['price'],$item['sale']) ?></b><br>
                                            <b class="sale">Giá gốc: <?php echo formatPrice($item['price']) ?></b><br>
                                            <?php else: ?>
                                            <b class="price">Giá: <?php echo formatPrice($item['price']) ?></b><br>
                                            <?php endif?>
                                            
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="box-left box-menu">
                        <h3 class="box-title"><i class="fa fa-shopping-bag"></i>  Sản phẩm bán chạy </h3>
                        <ul>
                            <?php foreach($productPay as $item): ?>
                                <li class="clearfix">
                                    <a href="chi-tiet-san-pham.php?id=<?php echo $item['id'] ?>">
                                        <img src="public/uploads/product/<?php echo $item['thunbar'] ?>" class="img-responsive pull-left" width="80" height="80">
                                        <div class="info pull-right">
                                            <p class="name"><?php echo $item['name'] ?></p >
                                            
                                            
                                            <?php if($item['sale'] > 0): ?>
                                            <b class="price">Giảm giá: <?php echo formatpricesale($item['price'],$item['sale']) ?></b><br>
                                            <b class="sale">Giá gốc: <?php echo formatPrice($item['price']) ?></b><br>
                                            <?php else: ?>
                                            <b class="price">Giá: <?php echo formatPrice($item['price']) ?></b><br>
                                            <?php endif?>
                                            
                                            
                                            <span class="view"><i class="fa fa-eye"></i> 100000 : <i class="fa fa-heart-o"></i> 10</span>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Storm Store - Phúc Trần</title>
    <link rel="shortcut icon" href="/public/frontend/images/storm.ico" type="image/x-icon">
    <link href="/public/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="/public/admin/css/sb-admin.css" rel="stylesheet">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
</head>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand" href="index.php">Welcome Master <?php echo $_SESSION['admin_name'] ?> ^.^</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                    <a class="nav-link" href="/admin/">
                        <i class="fa fa-fw fa-dashboard"></i>
                        <span class="nav-link-text">&nbsp;Accounting</span>
                    </a>
                </li>
                <li class="<?php echo isset($open) && $open == 'news' ? 'active' : '' ?>" data-toggle="tooltip" data-placement="right" title="news">
                    <a class="nav-link" href="/admin/modules/news/">
                        <i class="fa fa-picture-o"></i>
                        <span class="nav-link-text">&nbsp;Slide Show</span>
                    </a>
                </li>
                <li class="<?php echo isset($open) && $open == 'category' ? 'active' : '' ?>" data-toggle="tooltip" data-placement="right" title="category">
                    <a class="nav-link" href="/admin/modules/category/">
                        <i class="fa fa-list"></i>
                        <span class="nav-link-text">&nbsp;Danh mục</span>
                    </a>
                </li>
                <li class="<?php echo isset($open) && $open == 'product' ? 'active' : '' ?>" data-toggle="tooltip" data-placement="right" title="product">
                    <a class="nav-link" href="/admin/modules/product/">
                        <i class="fa fa-database"></i>
                        <span class="nav-link-text">&nbsp;Sản phẩm</span>
                    </a>
                </li>
                <li class="<?php echo isset($open) && $open == 'transaction' ? 'active' : '' ?>" data-toggle="tooltip" data-placement="right" title="transaction">
                    <a class="nav-link" href="/admin/modules/transaction/">
                        <i class="fa fa-rocket"></i>
                        <span class="nav-link-text">&nbsp;Quản lý đơn hàng</span>
                    </a>
                </li>
                <li class="<?php echo isset($open) && $open == 'user' ? 'active' : '' ?>" data-toggle="tooltip" data-placement="right" title="user">
                    <a class="nav-link" href="/admin/modules/user/">
                        <i class="fa fa-users"></i>
                        <span class="nav-link-text">&nbsp;Quản lý User</span>
                    </a>
                </li>
                <li class="<?php echo isset($open) && $open == 'admin' ? 'active' : '' ?>" data-toggle="tooltip" data-placement="right" title="admin">
                    <a class="nav-link" href="/admin/modules/admin/">
                        <i class="fa fa-user"></i>
                        <span class="nav-link-text">&nbsp;Admin</span>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav sidenav-toggler">
                <li class="nav-item">
                    <a class="nav-link text-center" id="sidenavToggler">
                        <i class="fa fa-fw fa-angle-left"></i>
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle mr-lg-2"  href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Have a good day,Mr <?php echo $_SESSION['admin_name'] ?></a>
                  <ul class="dropdown-menu" style="text-align: center; text-color:red;">
                    <li class="dropdown-divider"></li>
                    <li>
                        <a href="/logoutadmin.php"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="content-wrapper">
    <div class="container-fluid">
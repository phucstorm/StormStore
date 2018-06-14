<?php require_once __DIR__. "/autoload/autoload.php"; 
$sl = intval(getInput("sl"));
$key = intval(getInput("key"));
$_SESSION['cart'][$key]['sl'] = $sl; 
echo 1;
?>
<?php 
require "database-config-chart.php";
$sql = "SELECT category.name, COUNT(product.id) NumOfProduct FROM category INNER JOIN product ON category.id = product.category_id GROUP BY category.name";
$result = mysqli_query($conn, $sql);
if(!$result){
	$data["message"] = "Can't query data".mysqli_error($conn);
	$data["result"] = false;
} else {
	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	       $json[] = $row;
	    }
	    $data["product"] = $json;
	    $data["result"] = true;  
	} else {
		$data["message"] = "0 product";
		$data["result"] = false;
	}
}
$data["product"] = $json;
mysqli_close($conn);
echo json_encode($data);
?>
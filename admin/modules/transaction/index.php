<?php 
$open = "transaction";
require_once __DIR__. "/../../autoload/autoload.php";
if (isset($_GET['page'])) {
	$p = $_GET['page'];
}else{
	$p = 1; 
}
$sql = "SELECT transaction.*, users.name as nameuser, users.phone as phoneuser FROM transaction LEFT JOIN users on users.id = transaction.users_id ORDER BY ID DESC ";
$transaction = $db->fetchJone("transaction",$sql,$p,10,true);
if (isset($transaction['page'])) {
	$sotrang = $transaction['page'];
	unset($transaction['page']);
}
?>
<?php require_once __DIR__. "/../../layout/header.php"; ?>
<div class="row"> 
	<div class="col-lg-12">    
		<h1>Danh sách đơn hàng - Storm</h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/admin">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Danh sách đơn hàng</li>
		</ol>
		<div class="clearfix"></div>
		<?php require_once __DIR__. "/../../../partials/notification.php"; ?>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
				<div class="row">
					<div class="col-sm-12">
						<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%; text-align: center;">
							<thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 50px;">STT</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 180px;">Name</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 180px;">Phone</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 180px;">Money</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 180px;">Note</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 180px;">Status</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 80px;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $stt = 1;foreach ($transaction as $item):?>
								<tr role="row" class="odd">
									<td><?php echo $stt ?></td>
									<td><?php echo $item['nameuser'] ?></td>
									<td><?php echo $item['phoneuser'] ?></td>
									<td><?php echo formatPrice($item['amount']) ?></td>
									<td><?php echo $item['note'] ?></td>
									<td>
										<a href="status.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['status'] ==0 ? 'btn-danger' : 'btn-info'?>"><?php echo $item['status'] ==0 ? 'Xử lý' : 'Xử lý' ?></a>
									</td>
									<td>
										<a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php $stt++; endforeach ?>
							</tbody>
						</table>
						<div class="pull-right">
							<nav aria-label="Page navigation" class="clearfix">
								<ul class="pagination">
									<li>
										<a href="#" aria-label="Previous">
											<span aria-hidden="true">&laquo;</span>
										</a>
									</li>
									<?php for ($i=1; $i <= $sotrang ; $i++): ?>
										<?php 
										if(isset($_GET['page'])){
											$p = $_GET['page'];
										}else{
											$p = 1;
										}
										?>
										<li class="<?php echo ($i == $p) ? 'active' : '' ?>">
											<a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
										</li>
									<?php  endfor;?>
									<li>
										<a href="#" aria-label="Next">
											<span aria-hidden="true">&raquo;</span>
										</a>
									</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>   
<?php require_once __DIR__. "/../../layout/footer.php"; ?>
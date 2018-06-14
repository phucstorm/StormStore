<?php 
$open = "user";
require_once __DIR__. "/../../autoload/autoload.php";
if (isset($_GET['page'])) {
	$p = $_GET['page'];
}else{
	$p = 1; 
}
$sql = "SELECT users.* FROM users ORDER BY id DESC ";
$admin = $db->fetchJone("users",$sql,$p,5,true);
if (isset($admin['page'])) {
	$sotrang = $admin['page'];
	unset($admin['page']);
}
?>
<?php require_once __DIR__. "/../../layout/header.php"; ?>
<div class="row"> 
	<div class="col-lg-12">    
		<h1>Danh sách thành viên - Storm </h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/admin">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Thành viên</li>
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
									<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 50px;">Avatar</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 180px;">Name</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 60px;">Email</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 60px;">Phone</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 60px;">Created</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 80px;">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php $stt = 1;foreach ($admin as $item):?>
								<tr role="row" class="odd">
									<td><?php echo $stt ?></td>
									<td>
										<img src="/public/uploads/user-img/<?php echo $item['avatar'] ?>" width="80px" height="80px" >
									</td>
									<td><?php echo $item['name'] ?></td>
									<td><?php echo $item['email'] ?></td>
									<td><?php echo $item['phone'] ?></td>
									<td><?php echo $item['created_at'] ?></td>
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
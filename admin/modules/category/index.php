<?php 
$open = "category";
require_once __DIR__. "/../../autoload/autoload.php";
$category = $db->fetchAll("category");
?>
<?php require_once __DIR__. "/../../layout/header.php"; ?>
<div class="row"> 
	<div class="col-lg-12">    
		<h1>Danh mục sản phẩm - Storm<a href="add.php" class="btn btn-success pull-right"><i class="fa fa-plus"> Add</i></a></h1>
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="/admin">Dashboard</a>
			</li>
			<li class="breadcrumb-item active">Danh mục sản phẩm</li>
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
						<table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%; text-align: center">
							<thead>
								<tr role="row">
									<th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 50px;">STT</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 177px;">Name</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 90px;">Slug</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 90px;">Home</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Created</th>
									<th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 30px;">Action</th>
								</tr>
							</thead> 
							<tbody>
								<?php $stt = 1;foreach ($category as $item):?>
								<tr role="row" class="odd">
									<td class="sorting_1"><?php echo $stt ?></td>
									<td><?php echo $item['name'] ?></td>
									<td><?php echo $item['slug'] ?></td>
									<td>
										<a href="home.php?id=<?php echo $item['id'] ?>" class="btn btn-xs <?php echo $item['home'] == 1 ? 'btn-info' : 'btn-default' ?>"><?php echo $item['home'] == 1 ? 'Hiển thị' : 'Không'?></a>
									</td>
									<td><?php echo $item['created_at'] ?></td>
									<td>
										<a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i class="fa fa-pencil"></i></a>
										<a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php $stt++; endforeach ?>
							</tbody>
						</table>
					</div>
				</div> 
			</div>
		</div>
	</div>
</div>
<?php require_once __DIR__. "/../../layout/footer.php"; ?>
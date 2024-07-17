<?php $page = "Skill"; ?>
<?php include_once('../template/admin/header.php'); ?>
<?php include_once('../template/admin/sidebar.php'); ?>
<?php include_once('../template/admin/navbar.php'); ?>
<?php
	if(isset($_GET['delete']) AND is_numeric($_GET['delete'])) {
		// Check the Education id is valid or not
		$statement = $conn->prepare("SELECT * FROM skill WHERE skill_id=?");
		$statement->execute(array($_GET['delete']));
		$total = $statement->rowCount();
		if($total == 0 OR $_GET['delete'] == 1) {
			header('location: skill.php');
			exit;
		} else {
			// Delete from Education Table
			$statement = $conn->prepare("DELETE FROM skill WHERE skill_id=?");
			$statement->execute(array($_GET['delete']));
			$_SESSION['success'] = 'Skill has been deleted';
			header('location: skill.php');
			exit(0);
		}
	}
?>
<main class="content">
	<div class="container-fluid p-0">
		<div class="row">
			<div class="col-md-6">
				<h1 class="h3 mb-3"><strong>All</strong> Skill</h1>
			</div>
			<div class="col-md-6 text-md-end">
				<a href="add-skill.php" class="btn btn-pill btn-primary float-right"><i class="align-middle"
						data-feather="plus"></i> Add Skill</a>
			</div>
		</div><br>
		<div class="card">
			<div class="card-body">
				<table class="table dataTable table-striped table-hover">
					<thead>
						<tr>
							<th>Skill Icon</th>
							<th>Skill Title</th>
							<th>Value Skill</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php
			                $i=1;
			                $statement = $conn->prepare('SELECT * FROM skill ORDER BY skill_id DESC');
			                $statement->execute();
			                $skill = $statement->fetchAll(PDO::FETCH_ASSOC);
			                $sNo  = 1;
			                foreach ($skill as $skill) {
			                ?>
						<tr>
							<td><?php echo clean($skill['skill_icon']); ?></td>
							<td><?php echo clean($skill['skill_title']); ?></td>
							<td><?php echo clean($skill['value_skill']); ?></td>
							<td><?php echo ($skill['skill_status'] == 1) ? "<span class='badge bg-primary me-1 my-1'>Active</span>" : "<span class='badge bg-danger me-1 my-1'>Disabled <span>"; ?>
							</td>
							<td>
								<a href="edit-skill.php?edit=<?php echo clean($skill['skill_id']); ?>"><i
										class="align-middle" data-feather="edit-2"></i></a>
								<?php if($skill['skill_id'] != 1){ ?>
								<a href="#"
									data-href="skill.php?delete=<?php echo clean($skill['skill_id']); ?>"
									data-bs-toggle="modal" data-bs-target="#confirm-delete"><i class="align-middle"
										data-feather="trash"></i></a>
								<?php } ?>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<!-- BEGIN primary modal -->
			<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Delete Skill</h5>
							<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
						</div>
						<div class="modal-body m-3">
							<p class="mb-0">Are you sure to delete this skill?</p>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							<a class="btn btn-primary">Delete Skill</a>
						</div>
					</div>
				</div>
			</div>
			<!-- END primary modal -->
		</div>
	</div>
</main>
<?php include_once('../template/admin/footer.php'); ?>

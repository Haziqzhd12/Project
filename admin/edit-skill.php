<?php include_once('../template/admin/header.php'); ?>
<?php include_once('../template/admin/sidebar.php'); ?>
<?php include_once('../template/admin/navbar.php'); ?>
<?php 
  // Check the id is valid or not
  if(!isset($_GET['edit']) OR !is_numeric($_GET['edit'])) {
        header('location: edit-skill.php');
        exit;
      } else {

        $statement = $conn->prepare("SELECT * FROM skill WHERE skill_id=?");
        $statement->execute(array($_GET['edit']));
        $total  = $statement->rowCount();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if( $total == 0 ) {
          header('location: edit-skill.php');
          exit;
        }
        else{
          $a = extract($result,EXTR_PREFIX_ALL, "edit");
        }
    }
?>
<?php 
	if(isset($_POST['submit'])){

		$valid 						= 1;
		$skill_title 	= clean($_POST['skill_title']);
		$skill_icon 				= clean($_POST['skill_icon']);
		$value_skill 				= clean($_POST['value_skill']);
		
		if(isset($_POST['skill_status'])){
			$skill_status 		= clean($_POST['skill_status']);

			if($skill_status == 'on'){
				$skill_status = 1;
			}else{
				$skill_status = 0;
			}
		}else{
			$skill_status = 0;
		}
		//check if fields empty - code starts
		if(empty($skill_title)){
		    $valid    = 0;
		    $errors[] = 'Please Enter skill Title';
		}
		if(empty($skill_icon)){
		    $valid    = 0;
		    $errors[] = 'Please Enter skill Icon';
		}

	  //If everthing is OK - code starts
	if($valid == 1) {

			//insert the data

			$insert = $conn->prepare("UPDATE skill SET skill_title = ?, skill_icon = ?, value_skill = ?, skill_status = ? WHERE skill_id = ?");

			$insert->execute(array($skill_title, $skill_icon, $value_skill, $skill_status, $edit_skill_id));

			//insert the data - code ends

			$_SESSION['success'] = 'skill has been updated successfully!';
		  header('location: skill.php');
		  exit(0);
	  }
	}
?>
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><strong>Edit</strong> Skill</h1>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header" style="border-radius: 1rem;">
							<h5 class="card-title mb-0">Skill info</h5>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label" for="inputTitle">Skill Title</label>
										<input type="text" class="form-control" id="inputTitle"
											placeholder="Enter Skill Title" name="skill_title"
											value="<?php echo clean($edit_skill_title); ?>">
									</div>
                                    <div class="mb-3">
										<label class="form-label" for="skill_icon"> Skill Icon</label>
										<div class="d-flex align-items-center">
											<input type="text" class="form-control" id="skill_icon"
												placeholder="Enter Skill Icon" name="skill_icon"
												value="<?php echo clean($edit_skill_icon); ?>">
											<a href="https://boxicons.com/" class="btn btn-primary ms-4">Search</a>
										</div>
									</div>
									<div class="mb-3">
										<label class="form-label" for="inputvalue"> Value Skill</label>
										<input type="text" class="form-control" id="inputvalue"
											placeholder="Enter Value Skill" name="value_skill"
											value="<?php echo clean($edit_value_skill); ?>">
									</div>

									<div class="mt-4">
										<h5 class="card-title mb-0">Skill Status</h5> <br>
										<label for="flexSwitchCheckChecked">Enable / Disable</label>
										<div class="form-check form-switch mt-2">
											<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
												<?php if($edit_skill_status == 1){echo 'checked=""';} ?>
												name="skill_status">
										</div>
									</div><br>
									<div class="mt-4">
										<button type="submit" name="submit" class="btn btn-primary">Save changes</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</main>
<?php include_once('../template/admin/footer.php'); ?>
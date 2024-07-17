<?php include_once('../template/admin/header.php'); ?>
<?php include_once('../template/admin/sidebar.php'); ?>
<?php include_once('../template/admin/navbar.php'); ?>
<?php 
  // Check the id is valid or not
  if(!isset($_GET['edit']) OR !is_numeric($_GET['edit'])) {
        header('location: edit-blog.php');
        exit;
      } else {

        $statement = $conn->prepare("SELECT * FROM blog WHERE blog_id=?");
        $statement->execute(array($_GET['edit']));
        $total  = $statement->rowCount();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if( $total == 0 ) {
          header('location: edit-blog.php');
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
		$blog_title 	= clean($_POST['blog_title']);
		$blog_desc 				= clean($_POST['blog_desc']);
		$blog_url 				= clean($_POST['blog_url']);
	
		if(isset($_POST['blog_status'])){
			$blog_status 		= clean($_POST['blog_status']);

			if($blog_status == 'on'){
				$blog_status = 1;
			}else{
				$blog_status = 0;
			}
		}else{
			$blog_status = 0;
		}

		//check if fields empty - code starts
		if(empty($blog_title)){
		    $valid    = 0;
		    $errors[] = 'Please Enter Blog Title';
		}
		if(empty($blog_desc)){
		    $valid    = 0;
		    $errors[] = 'Please Enter Blog Description';
		}
		//check if fields empty - code ends

		//check User Photo - code starts
  	$blog_photo     = $_FILES['blog_image']['name'];
  	$blog_photo_tmp = $_FILES['blog_image']['tmp_name'];
  	if($blog_photo!='') {
    	$blog_photo_ext = pathinfo( $blog_photo, PATHINFO_EXTENSION );
    	$file_name = basename( $blog_photo, '.' . $blog_photo_ext );
	    	if( $blog_photo_ext!='jpg' && $blog_photo_ext!='png' && $blog_photo_ext!='jpeg' && $blog_photo_ext!='gif' ) {
	      	$valid = 0;
	      	$errors[]= 'You must have to upload jpg, jpeg, gif or png file<br>';
	    }
	  }
	  //check User Photo - code ends

	  //If everthing is OK - code starts
	if($valid == 1) {

	  	//Upload user Photo if available
			if($blog_photo!='') {
		    $blog_photo_file = '../blog-photo-'.time().'.'.$blog_photo_ext;
		    move_uploaded_file( $blog_photo_tmp, '../storage/blog/'.$blog_photo_file );
			}else{
				$blog_photo_file = $edit_blog_photo;
			}

			//insert the data

			$insert = $conn->prepare("UPDATE blog SET blog_title = ?, blog_desc = ?, blog_url = ?, blog_photo = ?, blog_status = ?, p_updated = ? WHERE blog_id = ?");

			$insert->execute(array($blog_title, $blog_desc, $blog_url, $blog_photo_file, $blog_status, $p_updated, $edit_blog_id));

			//insert the data - code ends

			$_SESSION['success'] = 'Blog has been updated successfully!';
		  header('location: blog.php');
		  exit(0);
	  }
	}
?>
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><strong>Edit</strong> Blog</h1>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-12 col-lg-3 d-flex">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<h5 class="card-title mb-0">Blog Image</h5><br>
									<div class="text-center">
										<img alt="Blog Image" src="../storage/blog/<?php echo clean($edit_blog_photo); ?>" class="rounded mx-auto d-block" width="100" height="100" id="blogImg">
										<div class="mt-2">
											<button type="button" class="btn btn-primary">Choose Image
												<input type="file" class="file-upload edit-file" value="Upload" name="blog_image" onchange="previewFile(this);" accept="image/*">
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-9 d-flex">
					<div class="card">
						<div class="card-header" style="border-radius:1rem";>
							<h5 class="card-title mb-0">Blog info</h5>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
                                    <label class="form-label" for="inputTitle">Blog Title</label>
										<input type="text" class="form-control" id="inputTitle" placeholder="Enter Blog Title" name="blog_title" value="<?php echo clean($edit_blog_title); ?>">
									</div>
									<div class="mb-3">
                                    <label class="form-label" for="blog_desc">Blog Description</label>
									<textarea rows="2" class="form-control" id="blog_desc" name="blog_desc" placeholder="Enter Blog Description"><?php echo htmlspecialchars($edit_blog_desc); ?></textarea>

									</div>
									<div class="mb-3">
                                    <label class="form-label" for="inputurl"> File Url</label>
										<input type="text" class="form-control" id="inputurl" placeholder="Enter Url" name="blog_url" value="<?php echo clean($edit_blog_url); ?>">
									</div>
									<div class="mt-4">
										<h5 class="card-title mb-0">Blog Status</h5><br>
										<label for="flexSwitchCheckChecked">Enable / Disable</label>
										<div class="form-check form-switch mt-2">
											<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" <?php if($edit_blog_status == 1){echo 'checked=""';} ?> name="blog_status">
										</div>
									</div>
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
<script>
	function previewFile(input) {
		var file = input.files[0];
		var reader = new FileReader();

		reader.onload = function(e) {
			document.getElementById('blogImg').src = e.target.result;
		}

		if (file) {
			reader.readAsDataURL(file);
		}
	}
</script>
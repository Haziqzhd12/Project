<?php $page = "Add Blog"; ?>
<?php include_once('../template/admin/header.php'); ?>
<?php include_once('../template/admin/sidebar.php'); ?>
<?php include_once('../template/admin/navbar.php'); ?>
<?php 
	if(isset($_POST['submit'])){
		$valid 				= 1;
		$blog_title 	= clean($_POST['blog_title']);
		$blog_desc 			= clean($_POST['blog_desc']);
		$blog_url 			= clean($_POST['blog_url']);

		$p_created       = date('Y-m-d H:i:s');
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

		$statement = $conn->prepare('SELECT  * FROM blog WHERE blog_title = ?');
	  	$statement->execute(array($blog_title));
	  	$total = $statement->rowCount();
	  	if( $total > 0 ) {
	    	$valid    = 0;
	    	$errors[] = 'This blog is already registered.';
	  	}
		//check if fields empty - code starts
		if(empty($blog_title)){
		    $valid    = 0;
		    $errors[] = 'Please Enter Blog Name';
		}
		if(empty($blog_desc)){
		    $valid    = 0;
		    $errors[] = 'Please Enter Blog Description';
		}
		//check Service Image - code starts
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
	  //check Service Image - code ends

	  //If everthing is OK - code starts
  	  if($valid == 1) {

  	  	//Upload Service Image if available
    	if($blog_photo!='') {
		    $blog_photo_file = 'blog-photo-'.time().'.'.$blog_photo_ext;
		    move_uploaded_file( $blog_photo_tmp, '../storage/blog/'.$blog_photo_file );
		}else{
			$blog_photo_file = "default.png";
		}

		//insert the data
		$insert = $conn->prepare("INSERT INTO blog (blog_title, blog_url, blog_desc, blog_photo, blog_status, p_created ) VALUES(?,?,?,?,?,?)");

		$insert->execute(array($blog_title, $blog_url, $blog_desc, $blog_photo_file, $blog_status, $p_created));

		//insert the data - code ends
		$_SESSION['success'] = 'Blog has been added successfully!';
	    header('location: blog.php');
	    exit(0);
  	  }
	}
 ?>
<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"><strong>Add</strong> Blog</h1>
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
			<div class="col-12 col-lg-4 d-flex">
					<div class="card">
						<div class="card-header" style="border-radius:1rem;">
							<h5 class="card-title mb-0">Blog Image</h5>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="text-center">
										<img alt="portifolio Image" src="../storage/blog/default.png"
											class="rounded mx-auto d-block" width="100" height="100" id="blogImg">
										<div class="mt-2">
											<button type="button" class="btn btn-primary">Blog Image
												<input type="file" class="file-upload" value="Upload"
													name="blog_image" onchange="previewFile(this);"
													accept="image/*">
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-lg-8 d-flex">
					<div class="card">
						<div class="card-header"style="border-radius:1rem;">
							<h5 class="card-title mb-0">Blog info</h5>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-md-12">
									<div class="mb-3">
										<label class="form-label" for="inputTitle">Blog Title</label>
										<input type="text" class="form-control" id="inputTitle"
											placeholder="Enter Blog Title" name="blog_title">
									</div>
									<div class="mb-3">
										<label class="form-label" for="blog_desc"> Blog Description</label>
										<textarea type="text" rows="2" class="form-control" id="blog_desc"
											placeholder="Enter Blog Description"
											name="blog_desc"></textarea>
									</div>
									<div class="mb-3">
										<label class="form-label" for="inputurl">File Url</label>
										<input type="text" class="form-control" id="inputurl" placeholder="Enter url"
											name="blog_url">
									</div>
									<div class="mt-4">
										<h5 class="card-title mb-0">Blog Status</h5><br>
										<label for="flexSwitchCheckChecked">Enable / Disable</label>
										<div class="form-check form-switch mt-2">
											<input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked"
												checked="" name="blog_status">
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
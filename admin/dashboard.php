<?php include_once('../template/admin/header.php'); ?>

<?php include_once('../template/admin/sidebar.php'); ?>

<?php include_once('../template/admin/navbar.php'); ?>
<?php 
	  
	  //education
	  $stmt = $conn->prepare("SELECT * FROM education");
	  $stmt->execute();
	  $education = $stmt->rowCount();

	  //portifolio
	  $stmt = $conn->prepare("SELECT * FROM portifolio");
	  $stmt->execute();
	  $portifolio = $stmt->rowCount();

	  //blog
	  $stmt = $conn->prepare("SELECT * FROM blog");
	  $stmt->execute();
	  $blog = $stmt->rowCount(); 

	  //Total Subscribers
	  $stmt = $conn->prepare("SELECT * FROM skill");
	  $stmt->execute();
	  $skill = $stmt->rowCount();
?>

<main class="content">
	<div class="container-fluid p-0">
		<h1 class="h3 mb-3"> Dashboard</h1>
		<div class="row">
			<div class="col-12">
				<div class="row">
					<div class="col-sm-3">
						<div class="card">
							<a href="skill.php" style="text-decoration:none">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Skill</h5>
										</div>
										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="slack"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3"><?php echo clean($skill); ?></h1>
									<div class="mb-0">
										<span class="text-muted">Total Skill</span>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="card">
							<a href="education.php" style="text-decoration:none">
							<div class="card-body">
								<div class="row">
									<div class="col mt-0">
										<h5 class="card-title">Education</h5>
									</div>
									<div class="col-auto">
										<div class="stat text-primary">
											<i class="align-middle" data-feather="book"></i>
										</div>
									</div>
								</div>
								<h1 class="mt-1 mb-3"><?php echo clean($education); ?></h1>
								<div class="mb-0">
									<span class="text-success">
										<span class="text-muted">Total</span>
									</span>
								</div>
							</div>
							</a>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="card">
							<a href="portifolio.php" style="text-decoration:none">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Portofolio</h5>
										</div>
										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="briefcase"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3"><?php echo clean($portifolio); ?></h1>
									<div class="mb-0">
										<span class="text-success">
											<span class="text-muted">Total Portofolio </span>
										</span>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="card">
							<a href="blog.php" style="text-decoration:none">
								<div class="card-body">
									<div class="row">
										<div class="col mt-0">
											<h5 class="card-title">Blog</h5>
										</div>
										<div class="col-auto">
											<div class="stat text-primary">
												<i class="align-middle" data-feather="book"></i>
											</div>
										</div>
									</div>
									<h1 class="mt-1 mb-3"><?php echo clean($blog); ?></h1>
									<div class="mb-0">
										<span class="text-success">
											<span class="text-muted">Total Blog </span>
										</span>
									</div>
								</div>
							</href=>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>


<?php include_once('../template/admin/footer.php'); ?>
<?php 
		$stmt =  $conn->prepare("SELECT count(*) as total, MONTHNAME(user_date_created) as month FROM users GROUP BY MONTH(user_date_created)");
		$stmt->execute();
	  	$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
	 
	  	//print_r($users);
	  	$month = array();
	  	$total = array();
	  	foreach ($users as $key => $value) {
	  		$month[] = $value['month'];
	  		$total[] = $value['total'];
	  	}
	  	$month = "'". implode("','", $month)."'";
	  	$total = implode(', ', $total);
 ?>
<script>
	document.addEventListener("DOMContentLoaded", function () {
		"use strict";
		var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
		var gradient = ctx.createLinearGradient(0, 0, 0, 225);
		gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
		gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
		// Line chart
		new Chart(document.getElementById("chartjs-dashboard-line"), {
			type: "line",
			data: {
				labels: [ < ? php echo clean($month); ? > ],
				datasets: [{
					label: "Users",
					fill: true,
					backgroundColor: gradient,
					borderColor: window.theme.primary,
					data: [ < ? php echo clean($total); ? > ]
				}]
			},
			options: {
				maintainAspectRatio: false,
				legend: {
					display: false
				},
				tooltips: {
					intersect: false
				},
				hover: {
					intersect: true
				},
				plugins: {
					filler: {
						propagate: false
					}
				},
				scales: {
					xAxes: [{
						reverse: true,
						gridLines: {
							color: "rgba(0,0,0,0.0)"
						}
					}],
					yAxes: [{
						ticks: {
							stepSize: 1000
						},
						display: true,
						borderDash: [3, 3],
						gridLines: {
							color: "rgba(0,0,0,0.0)"
						}
					}]
				}
			}
		});
	});
</script>
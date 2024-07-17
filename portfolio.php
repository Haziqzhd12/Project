<?php $page = "Portifolio"; ?>
<?php include_once('template/front/header.php'); ?>
<?php include_once('config/database.php'); ?>
<?php include_once('template/front/navbar.php');
?>
<section class="portfolio">

    <h1 style="font-size:4rem;" class="heading"> <span>My</span> Portfolio </h1>

    <div class="box-container">
        <?php
$a=1;
$stmt = $conn->prepare(
     "SELECT * FROM portifolio");
$stmt->execute();
$portifolio = $stmt->fetchAll();
foreach($portifolio as $row) 
{  	    
?>
       <div class="box" style="border-radius:15px">
            <img src="storage/portifolio/<?php echo $row['portifolio_photo']; ?>" alt="">
            <div class="content">
                <h3><?php echo $row['portifolio_title']; ?></h3>
                <p><?php echo $row['portifolio_desc']; ?></p>
                <a href="<?php echo $row['portifolio_url']; ?>" class="btn"> File <i class="fas fa-link"></i>
                </a>
            </div>
        </div>
        <?php } ?>
    </div><br><br>

    <h1 style="font-size:4rem;" class="heading"> <span>my</span> Blog </h1>

    <div class="box-container">
        <?php
$a=1;
$stmt = $conn->prepare(
     "SELECT * FROM blog");
$stmt->execute();
$blog = $stmt->fetchAll();
foreach($blog as $row) 
{  	    
?>
        <div class="box" style="border-radius:15px">
            <img src="storage/blog/<?php echo $row['blog_photo']; ?>" alt="">
            <div class="content">
                <h3><?php echo $row['blog_title']; ?></h3>
                <p><?php echo $row['blog_desc']; ?></p>
                <a href="<?php echo $row['blog_url']; ?>" class="btn"> File <i class="fas fa-link"></i>
                </a>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

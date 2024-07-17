<?php 
    ob_start();
    if(!session_start()){
      session_start();
    }
    include("template/front/header.php");
    include("template/front/navbar.php");
    include("config/database.php");

    function getRandomColor() {
        $letters = '0123456789ABCDEF';
        $color = '#';
        for ($i = 0; $i < 6; $i++) {
            $color .= $letters[rand(0, 15)];
        }
        return $color;
    }
?>

<?php
    $i=1;
    $statement = $conn->prepare('SELECT * FROM about ORDER BY about_id DESC');
    $statement->execute();
    $about = $statement->fetchAll(PDO::FETCH_ASSOC);
    $sNo  = 1;
    foreach ($about as $about); 
?>

<section class="about">
    <h1 style="font-size:4rem;" class="heading"> about <span>me</span> </h1>
    <div class="row">
        <div class="info-container">
            <h1>personal info</h1>
            <div class="box-container">
                <div class="box">
                    <h3> <span>name : </span> <?php echo $about['about_name']; ?> </h3>
                    <h3> <span>age : </span> <?php echo $about['about_age']; ?> </h3>
                    <h3> <span>email : </span> <?php echo $about['about_email']; ?> </h3>
                    <h3> <span>address : </span><?php echo $about['about_address']; ?> </h3>
                </div>
                <div class="box">
                    <h3> <span>freelance : </span> <?php echo $about['about_free']; ?> </h3>
                    <h3> <span>skill : </span> <?php echo $about['about_skill']; ?> </h3>
                    <h3> <span>experience : </span> <?php echo $about['about_exp']; ?> </h3>
                    <h3> <span>language : </span> <?php echo $about['about_lang']; ?></h3>
                </div>
            </div>
            <a target="_blank" href="https://<?php echo $about['about_button']; ?>" class="btn"> download CV <i class="fas fa-download"></i> </a>
        </div>
        <div class="image">
            <img style="border-radius:50%" src="storage/home/<?php echo $about['about_photo']; ?>" alt="">
        </div>
    </div>
</section>

<section class="education">
    <h1 style="font-size:4rem;" class="heading"> <span>my</span> education </h1>
    <div class="box-container">
        <?php
            $stmt = $conn->prepare("SELECT * FROM education");
            $stmt->execute();
            $education = $stmt->fetchAll();
            foreach($education as $row) 
        {        
        ?>
        <div class="box">
            <i class="fas fa-graduation-cap"></i>
            <span><?php echo $row['education_year']; ?></span>
            <h3><?php echo $row['education_title']; ?></h3>
            <p><?php echo $row['education_desc']; ?></p>
        </div>
        <?php } ?>
    </div>
</section>

<section class="skills">    
    <h1 style="font-size:4rem;" class="heading"> <span>my</span> skills </h1>
    <div class="box-container">
        <?php   
            $statement = $conn->prepare('SELECT * FROM skill ORDER BY skill_id DESC');
            $statement->execute();
            $skills = $statement->fetchAll(PDO::FETCH_ASSOC);
            foreach ($skills as $skill) {
        ?>
        <div class="box">
        <i class='bx bxl-<?php echo strtolower($skill['skill_icon']); ?>' style='font-size:8rem; color: <?php echo getRandomColor(); ?>;'></i>
            <h3><?php echo $skill['skill_title']; ?></h3>
            <div style="width:90% height:3px; color:green;" class="skill-bar ">
                <div class="skill-bar-fill" style="width: <?php echo $skill['value_skill']; ?>%;">
                    <?php echo $skill['value_skill']; ?>%
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

<?php include("template/front/navbar.php"); ?>

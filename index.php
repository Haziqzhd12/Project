<?php 
    include("template/front/header.php");
    include("template/front/navbar.php");
    include("config/database.php");
?>

<body>
<?php
    $statement = $conn->prepare('SELECT * FROM about ORDER BY about_id DESC');
    $statement->execute();
    $about = $statement->fetchAll(PDO::FETCH_ASSOC);
    $sNo  = 1;
    foreach ($about as $about); 
?>

<?php
    $statement = $conn->prepare('SELECT * FROM contact ORDER BY contact_id DESC');
    $statement->execute();
    $contact = $statement->fetchAll(PDO::FETCH_ASSOC);
    $sNo  = 1;
    foreach ($contact as $contact); 
?>

<section class="home">
    <div class="image">
        <img style="border-radius:50%" src="storage/home/<?php echo $about['about_photo']; ?>" alt="">
    </div>
    <div class="content">
        <h3>hi, i am <?php echo $about['about_name']; ?> </h3>
        <span> <?php echo $about['about_title']; ?></span>
        <p><?php echo $about['about_desc']; ?></p>
        <p><?php echo $contact['contact_info']; ?></p>
    </div>
</section>

</div>
</body>

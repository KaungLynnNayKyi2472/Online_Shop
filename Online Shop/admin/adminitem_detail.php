<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Item Detail</title>
</head>
<body>
    <h1>Item Detail</h1>
    <?php
        include("../setting/config.php");
        $id = $_GET['id'];
        $item = mysqli_query($con,"SELECT * FROM all_items WHERE id = $id");
        $row = mysqli_fetch_assoc($item);
    ?>
    <div>
        <a href="orders.php">&laquo; Go Back</a>
        <img src="Img/<?php echo $row['photo']?>">
        <h2><?php echo $row['title']?></h2>
        <i>by <?php echo $row['brand']?></i>
        <b>MMK <?php echo $row['price']?></b>
        <p><?php echo $row['review']?></p>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Item Detail</title>
</head>
<body class="user-select-none">
    <?php
        include("setting/config.php");
        $id = $_GET['id'];
        $item = mysqli_query($con,"SELECT * FROM all_items WHERE id = $id");
        $row = mysqli_fetch_assoc($item);
    ?>
    <div class="container my-5">
        <h1>Item Detail</h1>
        <p>
            <a href="index.php" class="text-decoration-none text-danger fs-5">&laquo;Back</a>
        </p>
        <img src="img/<?php echo $row['photo']?>">
        <h2 class="text-blue"><?php echo $row['title'];?></h2>
        <p class="fs-5">
            <i><?php echo $row['brand'];?></i>
        </p>
        <p class="fs-5">
            <b>MMK <?php echo $row['price'];?></b>
        </p>
        <p class="fs-5"><?php echo $row['review'];?></p>
        <a href="add_to_cart.php?id=<?php echo $id;?>" class="btn btn-secondary fs-5 px-5">Add to Cart</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
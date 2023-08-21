<?php
    session_start();
    include("setting/config.php");
    $cart = 0;
    if (isset($_SESSION['cart'])){
        foreach ($_SESSION['cart'] as $qty){$cart += $qty;}
    }
    if (isset($_GET['cat'])){
        $cat_id = $_GET['cat'];
        $items = mysqli_query($con,"SELECT * FROM all_items WHERE category_id = $cat_id");
    }
    else {$items = mysqli_query($con,"SELECT * FROM all_items");}
    $cats = mysqli_query($con,"SELECT * FROM categories");
?>
<!DOCTYPE html>
<html lang="en-MM">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Kaung Lynn Nay Kyi">
    <meta name="keyword" content="online shop">
    <meta name="description" content="My Ecommerce Website">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Online Shop</title>
</head>
<body class="user-select-none">
    <header class="container-fluid bg-dark py-1 px-5">
        <a href="admin/admin.php" class="text-decoration-none text-light fs-5">Admin</a>
    </header>
    <div class="container my-2">
        <div class="d-flex justify-content-between">
            <h1 class="text-blue">Online Shop</h1>
            <div class="d-flex align-items-center bg-secondary px-1">
                <p class="text-light fs-5 me-1">Shopping-Cart { <?php echo $cart;?> } items</p>
                <a href="view_cart.php" class="text-decoration-none text-light bg-warning fs-4 p-1">
                    <ion-icon name="cart"></ion-icon>
                </a>
            </div>
        </div>
        <nav class="navbar navbar-expand bg-danger my-2 py-2">
            <ul class="navbar-nav">
                <li class="nav-item px-3">
                    <a href="index.php" class="nav-link text-light fs-5">All Items</a>
                </li>
                <?php while ($rows = mysqli_fetch_assoc($cats)){?>
                <li class="nav-item px-3">
                    <a href="index.php?cat=<?php echo $rows['id']?>" class="nav-link text-light fs-5">
                        <?php echo $rows['name'];?>
                    </a>
                </li>
                <?php }?>
            </ul>
        </nav>
        <?php while ($row = mysqli_fetch_assoc($items)){?>
        <div class="d-inline-block border border-1 border-black p-3 mb-3 me-3">
            <img src="img/<?php echo $row['photo']?>">
            <p class="text-center fs-5">
                <b><a href="item_detail.php?id=<?php echo $row['id']?>" class="text-decoration-none text-blue">
                    <?php echo $row['title'];?>
                </a></b>
            </p>
            <p class="text-center fs-5">
                <i>MMK <?php echo $row['price'];?></i>
            </p>
            <a href="add_to_cart.php?id=<?php echo $row['id']?>" class="btn btn-secondary d-flex align-self-center fs-5 px-5">Add to Cart</a>
        </div>
        <?php }?>
    </div>
    <footer class="container-fluid bg-black py-1 px-5">
        <div class="row">
            <div class="col">
                <h3 class="text-light">Contact</h3>
                <p>
                    <a href="tel:+959795077288" class="text-decoration-none text-light fs-6">+95 9 795 077 288</a>
                </p>
                <p>
                    <a href="tel:+959950735097" class="text-decoration-none text-light fs-6">+95 9 950 735 097</a>
                </p>
                <p>
                    <a class="text-decoration-none text-light fs-6" href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCKCDlFrXtjffxGRZZSqPhfzkPdFJJFKFKFSjCSffCDGqcJffqKlKdLjjcNWPPRnZDkvWqJq">knnaykyi.dev@gmail.com</a>
                </p>
            </div>
        </div>
        <h6 class="text-light">&copy;opyright . Kaung Lynn Nay Kyi</h6>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>
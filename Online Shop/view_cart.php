<?php
    session_start();
    if (!isset($_SESSION['cart'])){
        header("location:index.php");
        exit();
    }
    include("setting/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>View Cart</title>
</head>
<body class="user-select-none">
    <div class="container my-5">
        <h1>View Cart</h1>
        <div class="d-flex justify-content-between">
            <p>
                <a href="index.php" class="text-decoration-none text-black fs-5">&laquo;Continue Shopping</a>
            </p>
            <p>
                <a href="clear_cart.php" class="text-decoration-none text-danger fs-5">&times;Clear Cart</a>
            </p>
        </div>
        <table class="table table-bordered border-black">
            <tr>
                <th class="bg-green fs-5">Item Name</th>
                <th class="bg-green fs-5">Quantity</th>
                <th class="bg-green fs-5">Unit Price</th>
                <th class="bg-green fs-5">Price</th>
            </tr>
            <?php
                $total = 0;
                foreach ($_SESSION['cart'] as $id => $qty){
                    $result = mysqli_query($con,"SELECT title,price FROM all_items WHERE id = $id");
                    $row = mysqli_fetch_assoc($result);
                    $total += $row['price'] * $qty;
            ?>
            <tr>
                <td class="fs-5"><?php echo $row['title'];?></td>
                <td class="fs-5"><?php echo $qty;?></td>
                <td class="fs-5">MMK <?php echo $row['price'];?></td>
                <td class="fs-5">MMK <?php echo $row['price'] * $qty;?></td>
            </tr>
            <?php }?>
            <tr>
                <td colspan="3" class="text-end fs-5"><b>Total : </b></td>
                <td class="fs-5">MMK <?php echo $total;?></td>
            </tr>
        </table>
        <h2>Order Now</h2>
        <form action="submit_order.php" method="post" class="border border-1 border-black p-3">
            <div class="row">
                <div class="col-3">
                    <p class="fs-5">Your Name : </p>
                    <p class="fs-5">Email : </p>
                    <p class="fs-5">Phone : </p>
                    <p class="fs-5">Visa Card : </p>
                    <p class="fs-5 mb-5">Address : </p>
                    <p>
                        <a href="index.php" class="text-decoration-none text-black fs-5">&laquo;Continue Shopping</a>
                    </p>
                </div>
                <div class="col-4 d-flex flex-column">
                    <input type="text" name="name" required class="mb-3">
                    <input type="email" name="email" required class="mb-3">
                    <input type="number" name="phone" required class="mb-3">
                    <input type="number" name="visa" required class="mb-3">
                    <textarea name="address" required class="mb-3"></textarea>
                    <input type="submit" value="Submit Order" class="btn btn-secondary fs-5">
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
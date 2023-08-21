<?php
    session_start();
    include("setting/config.php");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $visa = $_POST['visa'];
    $address = $_POST['address'];
    $received = date('Y-m-d H:i:s',strtotime('+7days',strtotime('now()')));
    mysqli_query($con,"INSERT INTO orders (name,email,phone,visa_card,address,status,ordered_date,received_date) VALUES ('$name','$email','$phone','$visa','$address',0,now(),'$received')");
    $order_id = mysqli_insert_id($con);
    foreach ($_SESSION['cart'] as $id => $qty){
        mysqli_query($con,"INSERT INTO order_item (item_id,order_id,qty) VALUES ('$id','$order_id','$qty')");
    }
    unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Submit</title>
</head>
<body class="user-select-none">
    <div class="container my-5">
        <h1>Order Submitted</h1>
        <div class="alert bg-green fs-5 my-5">Your Order is submitted. We will deliver the items soon.
            <a href="index.php">Online Shop Home</a></div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
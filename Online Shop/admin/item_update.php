<?php
    include("../setting/auth.php");
    include("../setting/config.php");
    $id = $_POST['id'];
    $title = $_POST['title'];
    $brand = $_POST['brand'];
    $review = $_POST['review'];
    $price = $_POST['price'];
    $photo = $_FILES['photo']['name'];
    $tmp = $_FILES['photo']['tmp_name'];
    $expired_date = date("Y-m-d-H:i:s",strtotime("+3 months",strtotime("now")));
    if ($photo){
        move_uploaded_file($tmp,'Img/$photo');
        $sql = "UPDATE all_items SET title = '$title', brand = '$brand', review = '$review', price = '$price', photo = '$photo', reached_date = now(), expired_date = '$expired_date' WHERE id = '$id'";
    }
    else {
        $sql = "UPDATE all_items SET title = '$title', brand = '$brand', review = '$review', price = '$price', reached_date = now(), expired_date = '$expired_date' WHERE id = '$id'";
    }
    mysqli_query($con,$sql);
    header('location:item_list.php');
?>
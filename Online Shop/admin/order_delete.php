<?php
    include("../setting/config.php");
    $id = $_GET['id'];
    mysqli_query($con,"DELETE FROM orders WHERE id = $id");
    header("location:orders.php");
?>
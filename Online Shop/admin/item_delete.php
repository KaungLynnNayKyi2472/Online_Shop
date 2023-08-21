<?php
    include('../setting/config.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM all_items WHERE id = $id";
    mysqli_query($con,$sql);
    header("location:item_list.php");
?>
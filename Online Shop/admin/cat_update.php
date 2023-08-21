<?php
    include("../setting/auth.php");
    include("../setting/config.php");
    $id = $_POST['id'];
    $name = $_POST['name'];
    $remark = $_POST['remark'];
    $sql = "UPDATE categories SET name = '$name', remark = '$remark', modified_date = now() WHERE id = $id";
    mysqli_query($con,$sql) or die(mysqli_error($conn));
    header("location:cat_list.php");
?>
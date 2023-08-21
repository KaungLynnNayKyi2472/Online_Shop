<?php
    include("../setting/auth.php");
    include("../setting/config.php");
    $name = $_POST['name'];
    $remark = $_POST['remark'];
    $sql = "INSERT INTO categories (name,remark,created_date,modified_date) VALUES ('$name','$remark',now(),now())";
    mysqli_query($con,$sql);
    header("location:cat_list.php");
?>
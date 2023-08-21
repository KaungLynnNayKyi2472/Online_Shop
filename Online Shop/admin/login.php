<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == "KLNK" && $password == "2472"){
        $_SESSION['auth'] = true;
        header("location:cat_list.php");
    }
    else{header("location:admin.php?login=failed");}
?>
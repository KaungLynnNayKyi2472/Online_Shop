<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Admin Login</title>
</head>
<body class="user-select-none">
    <form action="login.php" method="post" class="container d-flex justify-content-center my-5">
        <div class="row">
            <div class="col border border-light rounded d-flex flex-column p-5">
                <h1 class="text-light">Admin Login</h1>
                <label class="form-label text-light fs-5">Username :</label>
                <input type="text" name="username" class="form-control mb-3">
                <label class="form-label text-light fs-5">Password :</label>
                <input type="password" name="password" class="form-control mb-3">
                <input type="submit" value="Login" class="rounded border border-0 bg-green fs-5">
            </div>
        </div>
    </form>
    <?php if (isset($_GET['login']) and $_GET['login'] == "failed"){?>
        <p class="alert alert-warning fs-5 mx-5">Login failed! Username or Password incorrect.</p>
    <?php }?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
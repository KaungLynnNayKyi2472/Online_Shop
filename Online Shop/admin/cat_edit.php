<?php
    include("../setting/config.php");
    include("Navbar.php");
    $id = $_GET['id'];
    $result = mysqli_query($con,"SELECT * FROM categories WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category</title>
</head>
<body>
    <form action="cat_update.php" method="post" class="container d-flex justify-content-center my-5">
        <div class="row">
            <div class="col border border-light rounded p-5">
                <h1 class="text-light">Edit Category</h1>
                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                <label class="form-label text-light fs-5">Category Name :</label>
                <input type="text" name="name" class="form-control mb-3" value="<?php echo $row['name'];?>">
                <label class="form-label text-light fs-5">Remark :</label>
                <textarea name="remark" class="form-control mb-3"><?php echo $row['remark'];?></textarea>
                <input type="submit" value="Update Category" class="border border-0 rounded bg-green fs-5 py-1 px-3">
            </div>
        </div>
    </form>
</body>
</html>
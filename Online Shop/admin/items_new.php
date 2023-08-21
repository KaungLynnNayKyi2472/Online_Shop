<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Item</title>
</head>
<body>
    <?php include("Navbar.php");?>
    <form action="item_add.php" method="post" enctype="multipart/form-data" class="container d-flex justify-content-center my-5">
        <div class="row">
            <div class="col border border-light rounded p-5">
                <h1 class="text-light">New Item</h1>
                <label class="form-label text-light fs-5">Item Name :</label>
                <input type="text" name="title" class="form-control mb-3">
                <label class="form-label text-light fs-5">Brand :</label>
                <input type="text" name="brand" class="form-control mb-3">
                <label class="form-label text-light fs-5">Review :</label>
                <textarea name="review" class="form-control mb-3"></textarea>
                <label class="form-label text-light fs-5">Price :</label>
                <input type="text" name="price" class="form-control mb-3">
                <label class="form-label text-light fs-5">Category :</label>
                <select name="category_id" class="form-select mb-3">
                    <option selected>--Choose--</option>
                    <?php
                        include("../setting/config.php");
                        $result = mysqli_query($con,"SELECT id,name FROM categories");
                        while($row = mysqli_fetch_assoc($result)){
                    ?>
                    <option value="<?php echo $row['id'];?>">
                        <?php echo $row['name'];?>
                    </option>
                    <?php }?>
                </select>
                <label class="form-label text-light fs-5">Image :</label>
                <input type="file" name="photo" class="form-control mb-3">
                <input type="submit" value="Add Item" class="border border-0 rounded bg-green fs-5 py-1 px-3 me-3">
                <a href="item_list.php" class="link-offset-3 text-red fs-5">Back>></a>
            </div>
        </div>
    </form>
</body>
</htm>
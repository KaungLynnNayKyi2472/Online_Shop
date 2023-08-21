<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Item</title>
</head>
<body>
    <?php
        include("Navbar.php");
        include("../setting/config.php");
        $id = $_GET['id'];
        $result = mysqli_query($con,"SELECT * FROM all_items WHERE id = $id");
        $row = mysqli_fetch_assoc($result);
    ?>
    <form action="item_update.php" method="post" enctype="multipart/form-data" class="container d-flex justify-content-center my-5">
        <div class="row">
            <div class="col border border-light rounded p-5">
                <h1 class="text-light">Edit Item</h1>
                <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                <label class="form-label text-light fs-5">Title :</label>
                <input type="text" name="title" class="form-control mb-3" value="<?php echo $row['title'];?>">
                <label class="form-label text-light fs-5">Brand :</label>
                <input type="text" name="brand" class="form-control mb-3" value="<?php echo $row['brand'];?>">
                <label class="form-label text-light fs-5">Review :</label>
                <textarea name="review" class="form-control mb-3">
                    <?php echo $row['review'];?>
                </textarea>
                <label class="form-label text-light fs-5">Price :</label>
                <input type="text" name="price" class="form-control mb-3" value="<?php echo $row['price'];?>">
                <label class="form-label text-light fs-5">Image : </label>
                <img src="Img/<?php echo $row['photo']?>" width="200" height="100" class="mb-3">
                <input type="file" name="photo" class="form-control mb-3">
                <input type="submit" value="Update Item" class="border border-0 rounded bg-green fs-5 py-1 px-3">
            </div>
        </div>
    </form>
</body>
</html>
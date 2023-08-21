<?php include("../setting/auth.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories List</title>
</head>
<body>
    <?php
        include("Navbar.php");
        include("../setting/config.php");
        $result = mysqli_query($con,"SELECT * FROM categories");
    ?>
    <div class="container d-flex justify-content-center my-5">
        <div class="row">
            <div class="col border border-light rounded p-5">
                <h1 class="text-light">Category List</h1>
                <?php while ($row = mysqli_fetch_assoc($result)){?>
                    <div class="text-light fs-5 mb-3">
                        <button class="border border-0 rounded bg-red py-1 px-3 me-1" onclick="return confirm('Are you sure?')">
                            <a href="cat_delete.php?id=<?php echo $row['id']?>" class="text-decoration-none text-light"><ion-icon name="trash-outline"></ion-icon></a>
                        </button>
                        <button class="border border-0 rounded bg-green py-1 px-3 me-3">
                            <a href="cat_edit.php?id=<?php echo $row['id']?>" class="text-decoration-none text-black">Edit</a>
                        </button>
                        <?php echo $row['name'];?>
                    </div>
                <?php }?>
                <button class="border border-0 rounded bg-green fs-5 py-1 px-3">
                    <a href="cat_new.php" class="text-decoration-none text-black">New Category</a>
                </button>
            </div>
        </div>
    </div>
</body>
</html>
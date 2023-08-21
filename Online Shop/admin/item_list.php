<?php include("../setting/auth.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Items</title>
</head>
<body>
    <?php
        include("Navbar.php");
        include("../setting/config.php");
        $result = mysqli_query($con,"SELECT all_items.*,categories.name FROM all_items LEFT JOIN categories ON all_items.category_id = categories.id ORDER BY all_items.price DESC");
    ?>
    <div class="container my-5">
        <h1 class="text-light mb-3">All Items</h1>
        <div class="row">
        <?php while($row = mysqli_fetch_assoc($result)){?>
            <div class="col border border-light rounded p-3 me-3 mb-3">
                <div class="row">
                    <div class="col">
                        <p class="text-primary fs-5">
                            <?php echo $row['title'];?>
                        </p>
                        <p class="text-light fs-5">
                            <i><?php echo $row['brand'];?></i>
                            <b><?php echo $row['name'];?></b>
                        </p>
                        <p class="text-red fs-5">MMK 
                            <?php echo $row['price'];?>
                        </p>
                        <p class="text-light fs-5">
                            <?php echo $row['review'];?>
                        </p>
                        <button class="border border-0 rounded bg-red fs-5 py-1 px-3 me-1" onclick="return confirm('Are you sure!')">
                            <a href="item_delete.php?id=<?php echo $row['id']?>" class="text-decoration-none text-light"><ion-icon name="trash-outline"></ion-icon></a>
                        </button>
                        <button class="border border-0 rounded bg-green fs-5 py-1 px-3">
                            <a href="item_edit.php?id=<?php echo $row['id']?>" class="text-decoration-none text-black">Edit</a>
                        </button>
                    </div>
                    <div class="col-1">
                        <img src="Img/<?php echo $row['photo']?>">
                    </div>
                </div>
            </div>
        <?php }?>
        </div>
        <button class="border border-0 rounded bg-green fs-5 py-1 px-3">
            <a href="items_new.php" class="text-decoration-none text-black">New Item</a>
        </button>
    </div>
</body>
</html>